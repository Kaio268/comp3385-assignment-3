<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController; // Include ClientController
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Home and About routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Dashboard route with 'auth' middleware
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Authentication routes
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Client routes with 'auth' middleware
Route::get('/clients/add', [ClientController::class, 'create'])->name('clients.create')->middleware('auth');
Route::post('/clients', [ClientController::class, 'store'])->middleware('auth');
