<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Tableau de bord (admin)
Route::get('/', [AdminDashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');

// Produits
Route::resource('products', ProductController::class)->middleware('auth');

// Catégories
Route::resource('categories', CategoryController::class)->middleware('auth');

// Profil utilisateur connecté
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// Routes pour l'administration (middleware 'admin' si besoin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Exemples : statistiques, logs, etc.
});

// Routes d'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes de mot de passe oublié / reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('password.email');
Route::get('/verify-code', [ForgotPasswordController::class, 'showVerifyCodeForm'])->name('password.verify-code');
Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify-code-submit');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('password.update');

// Utilisateurs
Route::resource('users', UserController::class)->middleware('auth');

// Redirection après login
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth')->name('home');
