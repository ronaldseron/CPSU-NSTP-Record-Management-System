<?php

use App\Http\Controllers\StudentFormRegistrationController;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


Route::post('/form-registration', [StudentFormRegistrationController::class, 'store'])->middleware('auth:sanctum');
