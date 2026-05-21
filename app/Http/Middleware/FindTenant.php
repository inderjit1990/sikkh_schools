<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\TenantConnectionService;
use App\Services\TenantService;

class FindTenant
{
    protected TenantConnectionService $tenantConnectionService;
    protected TenantService $service;

    public function __construct(
        TenantConnectionService $tenantConnectionService,TenantService $service
    ) {
        $this->tenantConnectionService = $tenantConnectionService;
        $this->service = $service;
    }

    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        $centralDomains = [
            '127.0.0.1',
            'localhost',
            'sikhschools.com',
            'www.sikhschools.com',
        ];

        $cleanHost = explode(':', $host)[0];

        // ✅ Skip central domains
        if (in_array($cleanHost, $centralDomains)) {
            return $next($request);
        }

        try {

            /*
            |--------------------------------------------------------------------------
            | Tenant Cache
            |--------------------------------------------------------------------------
            */

            $cacheKey = "tenant_data_{$cleanHost}";
            $ttl = now()->addMinutes(20);

            $tenantData = Cache::remember($cacheKey, $ttl, function () use ($cleanHost) {

                $parts = explode('.', $cleanHost);
                $subdomain = $parts[0] ?? null;

                $school = School::query()
                    ->where('domain', $cleanHost)
                    ->orWhere('subdomain', $subdomain)
                    ->where('status', 'completed')
                    ->first();

                // ❌ DO NOT return response here
                if (!$school) {
                    return null;
                }

                return [
                    'school' => $school
                ];
            });
            // ✅ Handle "not found" OUTSIDE cache
            if (!$tenantData || !isset($tenantData['school'])) {
                return response()->view('errors.tenant-not-found', [
                    'host' => $cleanHost
                ], 404);
            }

            /*
            |--------------------------------------------------------------------------
            | Switch Tenant Schema
            |--------------------------------------------------------------------------
            */

            $school = $tenantData['school'];

            $schema = $this->tenantConnectionService
                ->sanitizeSchema($school->subdomain);

            $this->tenantConnectionService
                ->switchSchema($schema);


            /*
            |--------------------------------------------------------------------------
            | Bind Tenant Context
            |--------------------------------------------------------------------------
            */
            $schoolDetails = $this->service->findSchoolWithMany($school['code'],['code'],['sessions','themeStyle']);

            app()->instance('tenant', $schoolDetails);

            /*
            |--------------------------------------------------------------------------
            | Continue Request
            |--------------------------------------------------------------------------
            */

            $response = $next($request);

            /*
            |--------------------------------------------------------------------------
            | Reset Schema
            |--------------------------------------------------------------------------
            */

            // $this->tenantConnectionService->resetSchema();

            return $response;

        } catch (\Throwable $e) {

            // always reset on failure
            $this->tenantConnectionService->resetSchema();

            \Log::error("Tenant resolution failed for host: {$cleanHost}", [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            return response()->view('errors.tenant-not-found', [
                'host' => '/'
            ], 500);
        }
    }
}