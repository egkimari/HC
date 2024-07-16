<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HostelController as AdminHostelController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Landlord\DashboardController as LandlordDashboardController;
use App\Http\Controllers\Landlord\HostelController as LandlordHostelController;
use App\Http\Controllers\Landlord\BookingController as LandlordBookingController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\HostelController as StudentHostelController;
use App\Http\Controllers\Student\BookingController as StudentBookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LogoutController;

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
Route::resource('/hostels', StudentHostelController::class)->only(['index', 'show']);

// Authentication routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('hostels', AdminHostelController::class);
    Route::resource('users', AdminUserController::class);
    Route::get('reports', [AdminDashboardController::class, 'showReports'])->name('reports');
});

// Landlord routes
Route::prefix('landlord')->name('landlord.')->middleware(['auth', 'landlord'])->group(function () {
    Route::resource('hostels', LandlordHostelController::class);
    Route::get('profile', [ProfileController::class, 'index'])->name('landlord.profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('landlord.profile.update');
    Route::get('bookings', [LandlordBookingController::class, 'index'])->name('landlord.bookings.index');
    Route::put('bookings/{booking}', [LandlordBookingController::class, 'update'])->name('landlord.bookings.update');
});

// Student routes
Route::prefix('student')->name('student.')->middleware(['auth', 'student'])->group(function () {
    Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [ProfileController::class, 'index'])->name('student.profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('student.profile.update');
    Route::resource('hostels', StudentHostelController::class)->only(['index', 'show']);
    Route::get('bookings', [StudentBookingController::class, 'index'])->name('student.bookings.index');
});

// Booking routes
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
});

// Default Route for other undefined routes
Route::fallback(function() {
    return redirect()->route('home');
});
