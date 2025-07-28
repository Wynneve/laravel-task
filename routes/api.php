<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\RegistrationController;
use App\Http\Controllers\User\ProfileController;

Route::post('/registration', RegistrationController::class);
Route::get('/profile', ProfileController::class)->middleware('auth:sanctum');