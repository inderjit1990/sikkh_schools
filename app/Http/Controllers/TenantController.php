<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTenantRequest;
use App\Models\School;
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
        $school = School::where('verification_token', $token)
            ->first();
        // already verified
        if ($school->email_verified_at) {
            return redirect()->route('tenant.processing', $school->id);
        }

        DB::transaction(function () use ($school) {

            $school->update([
                'email_verified_at' => now(),
                'verification_token' => null,
                'status' => 'processing',
            ]);

        });

        // 🔥 Dispatch background setup job
        dispatch(new \App\Jobs\SetupSchoolJob($school));

        return redirect()->route('tenant.processing', $school->id);
    }   

    public function processing($id)
    {
        $school = $this->service->findSchool($id);

        return view('pages.processing', compact('school'));
    }

    public function status($id)
    {
        $school = $this->service->findSchool($id);

        if ($school->status === 'completed') {

            return response()->json([
                'status' => 'completed',
                'redirect' => route('tenant.ready', $school->id),
            ]);
        }

        if ($school->status === 'failed') {

            return response()->json([
                'status' => 'failed',
            ]);
        }

        return response()->json([
            'status' => 'processing',
        ]);
    }

    public function ready($id)
    {
        $school = $this->service->findSchool($id);

        if(env('APP_ENV') === 'local') {
            $url = 'http://' . $school->subdomain . env('DOMAIN', '.sikhschools.com');
        } else {
            $url = $school->domain 
                ? 'https://' . $school->domain 
                : 'https://' . $school->subdomain . env('DOMAIN', '.sikhschools.com');
        }
        return view('pages.verified', compact('url'));
    }
}