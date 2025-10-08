<?php

use App\Http\Controllers\PickupRequestController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ----------------------------
// Public (User / Guest) Routes
// ----------------------------
Route::get('/', function () {
    return view('welcome');
});

// User services page (public)
Route::get('/services', [PickupRequestController::class, 'services'])
    ->name('pickup_request.services');

// Pickup request form (for citizens / guests)
Route::get('/pickup-requests/create', [PickupRequestController::class, 'create'])
    ->name('pickup_requests.create');

// Store pickup request
Route::post('/pickup-requests', [PickupRequestController::class, 'store'])
    ->name('pickup_requests.store');

// ----------------------------
// Admin / Collector Routes
// ----------------------------
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Admin view all pickup requests
    Route::get('/pickup-requests', [PickupRequestController::class, 'index'])
        ->name('pickup_requests.index');

    // Assign collector to request
    Route::post('/pickup-requests/{pickupRequest}/assign', [PickupRequestController::class, 'assignCollector'])
        ->name('admin.pickup_requests.assign');

    // Update request status
    Route::post('/pickup-requests/{pickupRequest}/status', [PickupRequestController::class, 'updateStatus'])
        ->name('admin.pickup_requests.updateStatus');
});

// ----------------------------
// Dashboard & Profile
// ----------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
