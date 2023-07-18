<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/users',[UserController::class,'create'])->name('users.create');
Route::post('/users',[UserController::class,'store'])->name('users.store');
Route::post('/users/{user}',[UserController::class,'show'])->name('users.show');
Route::get('/users/email',[UserController::class,''])->name('users.show');
Route::post('/users/email',[UserController::class,'email'])->name('users.email');
Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
Route::get('/users/destroy',[UserController::class,'destroy'])->name('users.destroy');




