<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tenant Routes (Subdomain based)
|--------------------------------------------------------------------------
*/

Route::domain('{tenant}.localhost')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Public Pages
    |--------------------------------------------------------------------------
    */

    Route::get('/', fn() => view('tenant.pages.home'))->name('tenant.home');

    Route::get('/about', fn() => view('tenant.pages.about'))->name('tenant.about');

    Route::get('/posts', fn() => view('tenant.pages.posts'))->name('tenant.posts');

    /*
    |--------------------------------------------------------------------------
    | Auth Pages
    |--------------------------------------------------------------------------
    */

    Route::get('/login', fn() => view('tenant.pages.login'))->name('tenant.login');

});