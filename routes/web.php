<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Dosen\LoginController as DosenLoginController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LaboratoryController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\LecturerManagementController;
use App\Http\Controllers\Mahasiswa\AuthController as MahasiswaAuthController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\PeminjamanController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
| Here is where you can register web routes for your application.          |
| These routes are loaded by the RouteServiceProvider and assigned to      |
| the "web" middleware group.                                              |
|--------------------------------------------------------------------------|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Login Routes for Admin
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        // Admin Dashboard
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Resource Routes for Admin Management
        Route::resource('laboratories', LaboratoryController::class);
        Route::resource('facilities', FacilityController::class);
        Route::get('users', [UserManagementController::class, 'index'])->name('users.index');

        // Master Data Routes
        Route::resource('lecturers', LecturerManagementController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('prodi', ProdiController::class);
    });
});

// Dosen Routes
Route::prefix('dosen')->name('dosen.')->group(function () {

    // Login Routes for Dosen
    Route::get('login', [DosenLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [DosenLoginController::class, 'login']);
    Route::post('logout', [DosenLoginController::class, 'logout'])->name('logout');

    // Dosen Dashboard with Auth Middleware
    Route::middleware('auth:lecturer')->get('dashboard', [DosenLoginController::class, 'dashboard'])->name('dashboard');
});

// Mahasiswa Routes
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {

    // Login Routes for Mahasiswa
    Route::get('login', [MahasiswaAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [MahasiswaAuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [MahasiswaAuthController::class, 'logout'])->name('logout');
    Route::get('register', [MahasiswaAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [MahasiswaAuthController::class, 'register'])->name('register.submit');

    // Mahasiswa Dashboard with Auth Middleware
    Route::middleware('auth')->get('dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');

    // Peminjaman Routes
    Route::post('peminjaman/{laboratory}', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});
