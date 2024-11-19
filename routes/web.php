<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('auth/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('auth/register', [AuthController::class, 'register']);
Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Hotels CRUD
    Route::resource('hotels', HotelController::class);

    // Bookings CRUD
    Route::resource('bookings', BookingController::class)->only(['index', 'edit', 'update', 'destroy', 'show']);

    // Check Availability Route
    Route::get('hotels/check-availability', [HotelController::class, 'checkAvailability'])->name('hotels.checkAvailability');
});

// User Routes
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard
    Route::get('dashboard', [BookingController::class, 'userDashboard'])->name('dashboard');

    // Create, Store, Index, Show Bookings
    Route::resource('bookings', BookingController::class)->only(['create', 'store', 'index', 'show']);

    // Hotels Listing (for browsing)
    Route::get('hotels', [HotelController::class, 'index'])->name('hotels.index');

    // Check Availability Route
    Route::get('hotels/check-availability', [HotelController::class, 'checkAvailability'])->name('hotels.checkAvailability');
});

// Catch-all Route
Route::fallback(function () {
    return view('404'); // Create a 404.blade.php view
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
