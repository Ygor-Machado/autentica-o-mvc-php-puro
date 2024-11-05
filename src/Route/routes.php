<?php

use App\Route\Route;
use App\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'viewLogin']);
Route::get('/register', [AuthController::class, 'viewRegister']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

