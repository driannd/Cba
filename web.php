<?php

use App\Http\Controllers\AdminChefController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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
// Website
Route::get('/', [WebController::class, 'index'])->name('index');
Route::post('/', [WebController::class, 'booking'])->name('index.booking');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login.login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register.register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Dashboard
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

// Menu
Route::get('/admin/menu', [AdminMenuController::class, 'index'])->name('admin.menu.index');
Route::get('/admin/menu/create', [AdminMenuController::class, 'create'])->name('admin.menu.create');
Route::post('/admin/menu/create', [AdminMenuController::class, 'store'])->name('admin.menu.store');
Route::get('/admin/menu/edit/{id}', [AdminMenuController::class, 'edit'])->name('admin.menu.edit');
Route::put('/admin/menu/edit/{id}', [AdminMenuController::class, 'update'])->name('admin.menu.update');
Route::delete('/admin/menu/{id}', [AdminMenuController::class, 'destroy'])->name('admin.menu.delete');

// Chef
Route::get('/admin/chef', [AdminChefController::class, 'index'])->name('admin.chef.index');
Route::get('/admin/chef/create', [AdminChefController::class, 'create'])->name('admin.chef.create');
Route::post('/admin/chef/create', [AdminChefController::class, 'store'])->name('admin.chef.store');
Route::get('/admin/chef/edit/{id}', [AdminChefController::class, 'edit'])->name('admin.chef.edit');
Route::put('/admin/chef/edit/{id}', [AdminChefController::class, 'update'])->name('admin.chef.update');
Route::delete('/admin/chef/{id}', [AdminChefController::class, 'destroy'])->name('admin.chef.delete');

// User
Route::get('/admin/user', [RegisterController::class, 'adminUser'])->name('admin.user.index');
// Booking
Route::get('/admin/booking', [WebController::class, 'adminBooking'])->name('admin.booking.index');