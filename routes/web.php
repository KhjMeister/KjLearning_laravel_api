<?php

use Illuminate\Support\Facades\Route;

// Authentication Routes...
Route::get('login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('register', [App\Http\Controllers\Auth\LoginController::class,'register']);

// Password Reset Routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class],'reset');


//passport 
Route::get('/home/authorized-clients', [App\Http\Controllers\HomeController::class,'getAuthorizedClients'])->name('authorized-clients');
Route::get('/home/my-clients', [App\Http\Controllers\HomeController::class,'getClients'])->name('personal-clients');
Route::get('/home/my-tokens', [App\Http\Controllers\HomeController::class,'getTokens'])->name('personal-tokens');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');


