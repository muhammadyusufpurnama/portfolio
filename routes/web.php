<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Project1Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Project2Controller;

// Rute untuk Project1Controller
Route::get('/project1', [Project1Controller::class, 'index'])->name('portfolio.project1');
Route::get('/cars/create', [Project1Controller::class, 'create'])->name('cars.create');
Route::post('/cars', [Project1Controller::class, 'store'])->name('cars.store');

// Rute untuk Project2 (Undangan)
Route::get('/project2', [Project2Controller::class, 'index'])->name('portfolio.project2');
Route::post('/rsvp/store', [Project2Controller::class, 'storeRsvp'])->name('rsvp.store');

// Rute untuk Registrasi
Route::get('sub/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.store');

// Rute untuk Login
Route::get('sub/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.attempt');
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Untuk logout

// Tambahkan route ini untuk portofolio Anda
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

Route::resource('feedbacks', FeedbackController::class)->only([
    'index', 'store', 'update', 'destroy'
]);
