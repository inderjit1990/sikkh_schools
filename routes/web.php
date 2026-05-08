<?php

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::domain(['localhost', '127.0.0.1'])->group(function () {

    Route::get('/', fn() => view('pages.home'));
    Route::get('/about', fn() => view('pages.about'));
    Route::get('/posts', fn() => view('pages.posts'));

    Route::group(['as' => 'school.'], function () {

        Route::get('/register', [TenantController::class, 'registerTenant'])->name('register');
        Route::post('/register', [TenantController::class, 'register'])->name('store.register');

        Route::get('/verify/{token}', [TenantController::class, 'verify'])->name('verify');

        Route::get('/processing/{id}', [TenantController::class, 'processing'])->name('processing');
        Route::get('/status/{id}', [TenantController::class, 'status'])->name('status');

        Route::get('/ready/{id}', [TenantController::class, 'ready'])->name('ready');

    });

});