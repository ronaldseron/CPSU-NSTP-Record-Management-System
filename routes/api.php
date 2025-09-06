<?php

use App\Http\Controllers\StudentFormRegistrationController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->middleware(['auth', 'verified', 'role:user'])->group(function () {
    // Submit Form Registration
    Route::post('/form-registration', [StudentFormRegistrationController::class, 'store']);
});