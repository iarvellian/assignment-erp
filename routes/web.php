<?php

// routes/web.php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// --- Authentication Routes ---
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('users', UserController::class)->middleware('role:Superadmin');
    Route::resource('roles', RoleController::class)->middleware('role:Superadmin');
    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
    Route::get('orders/pdf/all', [OrderController::class, 'generatePdf'])->name('orders.pdf.all');
    Route::get('orders/pdf/{order}', [OrderController::class, 'generatePdf'])->name('orders.pdf.single');

});

Route::get('/', function () {
    return redirect()->route('dashboard');
});