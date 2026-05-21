<?php

namespace App\Jobs;

use App\Enums\Status;
use App\Models\School;
use App\Models\SchoolSession;
use App\Models\ThemeStyle;
use App\Services\TenantConnectionService;
use Database\Seeders\ThemeStyleSeeder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Artisan;

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

            
            $tenantConnectionService->switchSchema($schema);
            //after create schema and run migrations, you can also perform any additional setup like creating default roles, permissions, etc.
            // create record in tenant's schools table with status 'completed' and is_active true
            $schoolRecord = $this->school->toArray();
            $school = $this->school->create($schoolRecord + [
                'status' => Status::COMPLETED,
                'is_active' => true,
            ]);
           
            // //also create a school session record if you have a separate sessions table for tenant schools
            $school->sessions()->create([
                'school_id' => $school->id,
                'name' => now()->year . '-' . (now()->year + 1),
                'start_date' => now(),
                'end_date' => now()->addYear(),
                'is_current' => true,
            ]);
            

            $school->themeStyle()->create([
                'primary_color' => '#3490dc',
                'secondary_color' => '#ffed4a',
                'background_color' => '#f8f9fa',
                'text_color' => '#212529',
                'font_family' => 'Arial, sans-serif',
                'button_color' => '#3490dc',
                'button_text_color' => '#ffffff',
                'link_color' => '#3490dc',
                'header_color' => '#343a40',
                'footer_color' => '#343a40',
                'logo' => null,
                'theme' => 'default',
            ]);

            // 4. Reset back to public schema
            $tenantConnectionService->resetSchema();

            // 5. Mark school as active
            $this->school->update([
                'status' => Status::COMPLETED,
                'is_active' => true,
            ]);


        } catch (\Exception $e) {

            // reset schema on failure
            $tenantConnectionService->resetSchema();

            // optional cleanup
            
            // $tenantConnectionService->dropSchema($dbName);
            

            // update failed status
            $this->school->update([
                'status' => Status::FAILED,
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