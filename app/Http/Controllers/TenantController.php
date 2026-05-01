<?php

namespace App\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTenantRequest;
use App\Services\TenantService;
use GuzzleHttp\Psr7\Request;

class TenantController extends Controller
{
    protected $service;

    public function __construct(TenantService $service)
    {
        $this->service = $service;
    }

    public function registerTenant(Request $request)
    {
        dd($request);
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