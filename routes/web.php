<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn() => view('pages.home'));
Route::get('/about', fn() => view('pages.about'));
Route::get('/posts', fn() => view('pages.posts'));
Route::get('/register', fn() => view('pages.register'));