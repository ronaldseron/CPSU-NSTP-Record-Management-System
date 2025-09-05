<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// Dasboard Routes
Route::prefix('dashboard')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Main dashboard page
    Route::get('/', function() {
        return Inertia::render('Admin/Dashboard');
    })->name('dashboard');

    // Dashboard all students
    Route::get('/students', function() {
        return Inertia::render('Admin/Students');
    })->name('dashboard.students');

    // Dashboard ROTC
    Route::get('/rotc', function() {
        return Inertia::render('Admin/Rotc');
    })->name('dashboard.rotc');

    // Dashboard CWTS
    Route::get('/cwts', function() {
        return Inertia::render('Admin/Cwts');
    })->name('dashboard.cwts');

    // Dashboard LTS
    Route::get('/lts', function() {
        return Inertia::render('Admin/Lts');
    })->name('dashboard.lts');
});

// User Routes | Students Routes
Route::prefix('users')->middleware(['auth', 'verified', 'role:user'])->group(function () {
    // Main users page
    Route::get('/', function() {
        return Inertia::render('Users/Dashboard');
    })->name('dashboard.users');

    // Users CWTS
    Route::get('/cwts', function() {
        return Inertia::render('Users/Cwts');
    })->name('dashboard.users.cwts');

    // Users ROTC
    Route::get('/rotc', function() {
        return Inertia::render('Users/Rotc');
    })->name('dashboard.users.rotc');

    // Users LTS
    Route::get('/lts', function() {
        return Inertia::render('Users/Lts');
    })->name('dashboard.users.lts');

    // Submit Form Registration
    Route::post('/form-registration', [\App\Http\Controllers\StudentFormRegistrationController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
