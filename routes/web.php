<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Set workshop index as home page
Route::get('/', [RegistrationController::class, 'index'])->name('home');
Route::get('/workshops', [RegistrationController::class, 'index'])->name('events.index');

Route::middleware(['auth', 'verified'])->group(function () {
    // Redirect dashboard based on role
    Route::get('dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    })->name('dashboard');
    
    // User registrations
    Route::post('/workshops/register', [RegistrationController::class, 'store'])->name('events.register');
    
    // Admin Routes
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', EventController::class);
    });
});


require __DIR__.'/settings.php';

