<?php

use App\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.home'));
Route::get('/about', fn() => view('pages.about'));
Route::get('/posts', fn() => view('pages.posts'));

Route::get('/register', [TenantController::class, 'registerTenant']);
Route::post('/register', [TenantController::class, 'register']);