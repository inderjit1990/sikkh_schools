<?php

namespace App\Modules\Tenant\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Tenant\Requests\RegisterTenantRequest;
use App\Modules\Tenant\Services\TenantService;

class TenantController extends Controller
{
    protected $service;

    public function __construct(TenantService $service)
    {
        $this->service = $service;
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