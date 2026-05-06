<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTenantRequest;
use App\Services\TenantService;
use Illuminate\Support\Facades\DB;

class TenantController extends Controller
{
    protected $service;

    public function __construct(TenantService $service)
    {
        $this->service = $service;
    }

    public function registerTenant()
    {
        return view('pages.register');
    }

    public function register(RegisterTenantRequest $request)
    {
        $school = $this->service->register($request->validated());

        // decide final URL (domain or subdomain)
        $url = $school->domain 
            ? 'https://' . $school->domain 
            : 'https://' . $school->subdomain . '.sikhschools.com';

        return redirect()->route('tenant.register')
            ->with('success', 'School registered successfully!')
            ->with('url', $url);
    }

    public function verify($token)
    {
        $school = \App\Models\School::where('verification_token', $token)->firstOrFail();

        DB::transaction(function () use ($school) {

            // mark verified
            $school->update([
                'email_verified_at' => now(),
                'verification_token' => null,
                'is_active' => true,
            ]);

            // 🔥 CREATE SCHEMA HERE
            DB::statement("CREATE SCHEMA {$school->code}");

            // (optional) run tenant migrations here
        });

        $url = $school->domain;

        return view('pages.verified', compact('url'));
    }
}