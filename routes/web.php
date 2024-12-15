<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaboratoryController;
use App\Http\Controllers\Admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('laboratories', LaboratoryController::class);
        Route::resource('facilities', FacilityController::class);
        Route::get('users', [UserManagementController::class, 'index'])->name('users.index');

        // Master Data
        Route::resource('lecturers', LecturerController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('prodi', ProdiController::class);
    });
});
