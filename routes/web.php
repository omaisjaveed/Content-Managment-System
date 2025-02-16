<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PostController;


// Route::get('/', function () {
//     return view('auth.dashboard');
// });
// Route::get('/', function () {
//     return view('layouts.website');
// });


// web routes
Route::get('/', [App\Http\Controllers\WebsiteController::class, 'show_home_page'])->name('website.index');
// web routes



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/dashboard', [App\Http\Controllers\Auth\DashboardController::class, 'dashboard'])->name('auth.dashboard');



Route::resource('auth/Posts', PostController::class);
Route::resource('auth/Posts', PostController::class);


