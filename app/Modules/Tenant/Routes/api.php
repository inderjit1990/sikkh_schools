<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Tenant\Controllers\TenantController;


Route::prefix('tenants')->group(function () {
    Route::post('register', [TenantController::class, 'register']);
});