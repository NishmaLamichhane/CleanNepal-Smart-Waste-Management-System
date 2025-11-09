<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PickupRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;

// ----------------------------
// Public (User / Guest) Routes
// ----------------------------
Route::get('/', [PagesController::class, 'welcome'])->name('home');
// Route::get('/viewsupport/{id}', [PagesController::class, 'viewsupport'])->name('viewsupport');
// User services page (public)
Route::get('/viewblog', [PagesController::class, 'viewblog'])->name('viewblog');
Route::get('/viewsupport', [PagesController::class, 'viewsupport'])->name('viewsupport');
Route::get('/viewsupportdetails/{id}', [PagesController::class, 'viewsupportdetails'])->name('viewsupportdetails');

Route::middleware(['auth'])->group(function () {
    Route::resource('pickup_request',PickupRequestController::class);
});
// ----------------------------
// Admin / Collector Routes
// ----------------------------
Route::prefix('admin')->middleware(['auth'])->group(function () {

});
Route::resource('support',SupportController::class);
Route::resource('blog',BlogController::class);

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
