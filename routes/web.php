<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/', [AuthController::class, 'login'])->name('login');


Route::middleware('auth.session')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/events', [EventController::class, 'index'])->name('event_list');
    Route::post('/events/book/{id}', [EventController::class, 'bookTicket'])->name('book_ticket');
    Route::get('/bookings', [EventController::class, 'history'])->name('booking_history');
});

