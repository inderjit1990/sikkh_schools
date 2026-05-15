<?php

namespace App\Jobs;

use App\Models\School;
use App\Models\SchoolSession;
use App\Services\TenantConnectionService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SetupSchoolJob implements ShouldQueue
{
    use Queueable;

    protected School $school;

    /**
     * Create a new job instance.
     */
    public function __construct(School $school)
    {
        $this->school = $school;
    }

    /**
     * Execute the job.
     */
    public function handle(
        TenantConnectionService $tenantConnectionService
    ): void {

        try {
            $dbName = $this->school->subdomain;
            // sanitize schema
            $schema = $tenantConnectionService
                ->sanitizeSchema($dbName);

            // 1. Create tenant schema
            $tenantConnectionService->createSchema($schema);

            // 2. Run tenant migrations
            $tenantConnectionService->runTenantMigrations($schema);

            // 3. Optional: run tenant seeders
            
            $tenantConnectionService->seedTenant(
                $schema,
                \Database\Seeders\ThemeStyleSeeder::class
            );
            
            $tenantConnectionService->switchSchema($schema);
            //after create schema and run migrations, you can also perform any additional setup like creating default roles, permissions, etc.
            // create record in tenant's schools table with status 'completed' and is_active true
            $schoolRecord = $this->school->toArray();
            $this->school->create($schoolRecord + [
                'status' => 'completed',
                'is_active' => true,
            ]);
           
            // //also create a school session record if you have a separate sessions table for tenant schools
            SchoolSession::create([
                'name' => now()->year . '-' . (now()->year + 1),
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'is_current' => true,
            ]);
            
            // 4. Reset back to public schema
            $tenantConnectionService->resetSchema();

            // 5. Mark school as active
            $this->school->update([
                'status' => 'completed',
                'is_active' => true,
            ]);


        } catch (\Exception $e) {

            // reset schema on failure
            $tenantConnectionService->resetSchema();

            // optional cleanup
            
            $tenantConnectionService->dropSchema($dbName);
            

            // update failed status
            $this->school->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            // log error
            \Log::error('School setup failed', [
                'school_id' => $this->school->id,
                'schema' => $dbName,
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}