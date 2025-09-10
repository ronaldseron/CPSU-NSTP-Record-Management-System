<?php

use App\Http\Controllers\Admin\AllStudentsController;
use App\Http\Controllers\Admin\CwtsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LtsController;
use App\Http\Controllers\Admin\RotcController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentFormRegistrationController;
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
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Dashboard all students
    Route::get('/students', [AllStudentsController::class, 'index'])->name('dashboard.students');

    // Dashboard ROTC
    Route::get('/rotc', [RotcController::class, 'index'])->name('dashboard.rotc');

    // Dashboard CWTS
    Route::get('/cwts', [CwtsController::class, 'index'])->name('dashboard.cwts');

    // Dashboard LTS
    Route::get('/lts', [LtsController::class, 'index'])->name('dashboard.lts');
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

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
