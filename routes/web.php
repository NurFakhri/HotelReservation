<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserAuthController;
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


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
});

// route setelah login untuk membedakan antara admin dan user
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // Tambahkan rute admin lainnya sesuai kebutuhan
    });

    Route::prefix('user')->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        // Tambahkan rute user lainnya sesuai kebutuhan
    });
});

// Contoh penggunaan resourceful routing
Route::resource('users', UserController::class);
Route::resource('bookings', BookingController::class);
Route::resource('room-types', RoomTypeController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('payments', PaymentController::class);
Route::resource('rooms', RoomController::class);

//yang dipakai, atas masih sementara

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/rooms/store', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{id}/update', [RoomController::class, 'update'])->name('rooms.update');
Route::get('/rooms/{id}', [RoomController::class, 'show'])->name('rooms.show');
Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{id}/edit', 'BookingController@edit')->name('bookings.edit');
Route::put('/bookings/{id}', 'BookingController@update')->name('bookings.update');

Route::get('/room/{room_id}/review', [ReviewController::class, 'create'])->name('user.roomreview.create');
Route::post('/room/{room_id}/review', [ReviewController::class, 'store'])->name('user.roomreview.store');
Route::get('/review', [ReviewController::class, 'index'])->name('reviews.index');

//welcome
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

//login
Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/user/room', [UserController::class, 'showroom'])->name('user.roominfo');
Route::get('/user/room/{room_id}', [UserController::class, 'show'])->name('user.roomdetail');
Route::get('/user/create/{room_id}', [UserController::class, 'usercreate'])->name('user.roombooking');
Route::post('/user/store', [UserController::class, 'userstore'])->name('user.roomstore');
Route::get('/user/bookings', [UserController::class, 'userBookings'])->name('user.roomuser');
