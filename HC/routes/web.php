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
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Landlord\LandlordProfileController;

// Home and Static Pages
Route::get('/', [HomeController::class, 'index'])->name('home'); // Home page
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Authentication Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Routes for viewing hostels
Route::get('/hostels', [HostelController::class, 'index'])->name('hostels.index');
Route::get('/hostels/{hostel}', [HostelController::class, 'show'])->name('hostels.show');

// Booking Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('bookings', BookingController::class)->only(['index', 'create', 'store']);
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('hostels', AdminHostelController::class);
    Route::resource('users', AdminUserController::class);
    Route::get('reports', [AdminDashboardController::class, 'showReports'])->name('reports');
});

// Landlord Routes
Route::prefix('landlord')->name('landlord.')->middleware(['auth', 'role:landlord'])->group(function () {
    Route::get('dashboard', [LandlordDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [LandlordProfileController::class, 'show'])->name('profile.show'); // Landlord Profile
    Route::resource('hostels', LandlordHostelController::class)->except(['show']);
    Route::resource('bookings', LandlordBookingController::class)->except(['show']);
});

// Student Routes
Route::prefix('student')->name('student.')->middleware(['auth', 'role:student'])->group(function () {
    Route::get('dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::resource('hostels', StudentHostelController::class)->only(['index']);
    Route::resource('bookings', StudentBookingController::class)->only(['index']);
    Route::get('/profile', [StudentProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [StudentProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [StudentProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [StudentProfileController::class, 'destroy'])->name('profile.destroy');
});

// Default Route for other undefined routes
Route::fallback(function () {
    return redirect()->route('home');
});
