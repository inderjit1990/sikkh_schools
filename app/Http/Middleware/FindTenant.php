<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class FindTenant
{
    public function handle($request, Closure $next)
    {
        $host = $request->getHost();

        if ($host === 'sikhschools.com' || '127.0.0.1') {
            return $next($request);
        }

        $cacheKey = "tenant_data_{$host}";
        $ttl = 10; // 10 minutes

        // 1. Try to get data from cache
        $tenantData = Cache::get($cacheKey);

        if (!$tenantData) {
            // 2. Cache Miss: Query Database
            $parts = explode('.', $host);
            $subdomain = $parts[0];

            $school = School::where('domain', $host)
                ->orWhere('code', $subdomain)
                ->first();

            if (!$school) {
                return response()->json(['error' => 'School not found'], 404);
            }

            $session = DB::table('school_sessions')
                ->where('school_id', $school->id)
                ->where('is_current', true)
                ->first();

            $tenantData = [
                'school' => $school,
                'session' => $session
            ];
        }

        // 3. Sliding Logic: Re-save to cache for another 10 mins on every request
        // This ensures the 10-min timer only starts counting down after the LAST request.
        Cache::put($cacheKey, $tenantData, now()->addMinutes($ttl));

        // 4. Apply Tenant Context
        $school = $tenantData['school'];
        
        // Switch Schema (PostgreSQL)
        DB::statement("SET search_path TO {$school->schema_name}");

        app()->instance('tenant', $school);
        app()->instance('current_session', $tenantData['session']);

        return $next($request);
    }
}