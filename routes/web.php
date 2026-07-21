<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\BokingController;
use App\Http\Controllers\PelangganController;

// ── Public Landing ────────────────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
});

// ── Admin Routes (role: admin only) ──────────────────────────────────
Route::middleware(['auth', 'verified', 'admin.only'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kamar', KamarController::class);

    Route::get('/boking', [BokingController::class, 'index'])->name('boking.index');
    Route::patch('/boking/{id}/confirm', [BokingController::class, 'confirm'])->name('boking.confirm');
    Route::patch('/boking/{id}/reject', [BokingController::class, 'reject'])->name('boking.reject');
    Route::patch('/boking/{id}/complete', [BokingController::class, 'complete'])->name('boking.complete');
});

// ── Customer (Pelanggan) Routes (role: pelanggan only) ────────────────
Route::middleware(['auth', 'verified', 'pelanggan.only'])->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'dashboard'])->name('pelanggan.dashboard');
    Route::get('/pelanggan/kamar', [PelangganController::class, 'kamar'])->name('pelanggan.kamar');
    Route::post('/pelanggan/booking', [PelangganController::class, 'storeBooking'])->name('pelanggan.booking.store');
    Route::get('/pelanggan/boking', [PelangganController::class, 'bokingHistory'])->name('pelanggan.boking.index');
    Route::patch('/pelanggan/boking/{id}/cancel', [PelangganController::class, 'cancelBooking'])->name('pelanggan.boking.cancel');
    Route::get('/pelanggan/profile', [PelangganController::class, 'profile'])->name('pelanggan.profile');
});

// ── Profile (shared - both roles, auth required) ──────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
