<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTenantRequest;
use App\Services\TenantService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $service;

    public function __construct(TenantService $service)
    {
        $this->service = $service;
    }

    public function registerTenant()
    {
        dd('request');
        return view('pages.home');
    }

    public function register(RegisterTenantRequest $request)
    {
        $school = $this->service->register($request->validated());

        return response()->json([
            'message' => 'School registered successfully',
            'data' => $school,
            'url' => 'https://' . $school->domain
        ]);
    }
    
}
