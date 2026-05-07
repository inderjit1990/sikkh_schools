<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Services\TenantConnectionService;

class FindTenant
{
    protected TenantConnectionService $tenantConnectionService;

    public function __construct(
        TenantConnectionService $tenantConnectionService
    ) {
        $this->tenantConnectionService = $tenantConnectionService;
    }

    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        /*
        |--------------------------------------------------------------------------
        | Skip Central Domains
        |--------------------------------------------------------------------------
        */

        $centralDomains = [
            '127.0.0.1',
            'localhost',
            'sikhschools.com',
            'www.sikhschools.com',
        ];

        // support localhost:8000 etc
        $cleanHost = explode(':', $host)[0];
        dd('hi');

        if (in_array($cleanHost, $centralDomains)) {
            return $next($request);
        }
        /*
        |--------------------------------------------------------------------------
        | Tenant Cache
        |--------------------------------------------------------------------------
        */

        $cacheKey = "tenant_data_{$cleanHost}";
        $ttl = now()->addMinutes(10);

        $tenantData = Cache::remember(
            $cacheKey,
            $ttl,
            function () use ($cleanHost) {

                // extract subdomain
                $parts = explode('.', $cleanHost);

                $subdomain = count($parts) > 2
                    ? $parts[0]
                    : null;

                // find school
                $school = School::query()
                    ->where('domain', $cleanHost)
                    ->orWhere('subdomain', $subdomain)
                    ->where('is_active', true)
                    ->first();

                if (!$school) {
                    abort(404, 'School not found.');
                }

                // current session
                $session = \DB::table('school_sessions')
                    ->where('school_id', $school->id)
                    ->where('is_current', true)
                    ->first();

                return [
                    'school' => $school,
                    'session' => $session,
                ];
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Switch Tenant Schema
        |--------------------------------------------------------------------------
        */

        $school = $tenantData['school'];

        $schema = $school->schema_name
            ?? $school->code;

        $this->tenantConnectionService
            ->switchSchema($schema);

        /*
        |--------------------------------------------------------------------------
        | Bind Tenant Context
        |--------------------------------------------------------------------------
        */

        app()->instance('tenant', $school);

        app()->instance(
            'current_session',
            $tenantData['session']
        );

        /*
        |--------------------------------------------------------------------------
        | Continue Request
        |--------------------------------------------------------------------------
        */

        $response = $next($request);

        /*
        |--------------------------------------------------------------------------
        | Reset Schema Back To Public
        |--------------------------------------------------------------------------
        */

        $this->tenantConnectionService
            ->resetSchema();

        return $response;
    }
}