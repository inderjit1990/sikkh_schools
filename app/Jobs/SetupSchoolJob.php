<?php

namespace App\Jobs;

use App\Models\School;
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

            // sanitize schema
            $schema = $tenantConnectionService
                ->sanitizeSchema($this->school->code);

            // 1. Create tenant schema
            $tenantConnectionService->createSchema($schema);

            // 2. Run tenant migrations
            $tenantConnectionService->runTenantMigrations($schema);

            // 3. Optional: run tenant seeders
            /*
            $tenantConnectionService->seedTenant(
                $schema,
                \Database\Seeders\TenantSeeder::class
            );
            */

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
            /*
            $tenantConnectionService->dropSchema(
                $this->school->code
            );
            */

            // update failed status
            $this->school->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            // log error
            \Log::error('School setup failed', [
                'school_id' => $this->school->id,
                'schema' => $this->school->code,
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}