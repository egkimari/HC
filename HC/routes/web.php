<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\HostelController as AdminHostelController;
use App\Http\Controllers\Landlord\HostelController as LandlordHostelController;
use App\Http\Controllers\Student\HostelController as StudentHostelController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Landlord\BookingController as LandlordBookingController;
use App\Http\Controllers\Student\BookingController as StudentBookingController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// About page
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

// Contact page
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Public hostel routes
Route::resource('/hostels', StudentHostelController::class)
    ->only(['index', 'show']);  // Only 'index' and 'show' actions for public

// Authentication routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Hostel management routes for admin
    Route::resource('hostels', AdminHostelController::class);

    // User management routes for admin
    Route::resource('users', AdminUserController::class);

    // Reports route for admin
    Route::get('reports', [AdminDashboardController::class, 'showReports'])->name('reports');
});

// Landlord routes
Route::prefix('landlord')->name('landlord.')->middleware(['auth', 'landlord'])->group(function () {
    Route::get('dashboard', [LandlordDashboardController::class, 'index'])->name('dashboard');
    
    // Hostel management routes for landlord
    Route::resource('hostels', LandlordHostelController::class);

    // Profile routes for landlord
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Bookings routes for landlord
    Route::get('bookings', [LandlordBookingController::class, 'index'])->name('bookings.index');
    Route::put('bookings/{booking}', [LandlordBookingController::class, 'update'])->name('bookings.update');
});

// Student routes
Route::prefix('student')->name('student.')->middleware(['auth', 'student'])->group(function () {
    Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes for students
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Hostel routes for students
    Route::resource('hostels', StudentHostelController::class)
        ->only(['index', 'show']);  // Only 'index' and 'show' actions for Student
    
    // Bookings routes for students
    Route::get('bookings', [StudentBookingController::class, 'index'])->name('bookings.index');
});

// Default Route for other undefined routes
Route::fallback(function() {
    return redirect()->route('home');
});
