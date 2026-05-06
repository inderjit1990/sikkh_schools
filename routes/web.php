<?php

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', fn() => view('pages.home'));
Route::get('/about', fn() => view('pages.about'));
Route::get('/posts', fn() => view('pages.posts'));

Route::group(['as' => 'tenant.'], function () {
    Route::get('/register', [TenantController::class, 'registerTenant'])->name('register');
    Route::post('/register', [TenantController::class, 'register'])->name('store.register');
    Route::get('/verify/{token}', [TenantController::class, 'verify'])->name('tenant.verify');
});