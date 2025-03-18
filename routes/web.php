<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\Auth\CustomLoginController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::get('/Services', function () {
    return Inertia::render('Services');
})->name('ListServices');
Route::get('/SendToFriend', function () {
    return Inertia::render('SendFriend');
})->name('SendF');
Route::get('/Myservices', function () {
    return Inertia::render('ProfileFormV');
})->name('ProfileF');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de registro
Route::get('/register', [CustomRegisterController::class, 'create'])->name('register');
Route::post('/register', [CustomRegisterController::class, 'store']);

// Rutas de login (se usa solo la ruta estándar 'login')
Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login');

// Dashboard para diferentes roles
Route::get('/dashboard/contratista', fn() => view('contratista.dashboard'))->name('contratista.dashboard');
Route::get('/dashboard/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');

// Ruta de depuración de autenticación
Route::get('/debug-auth', function () {
    return [
        'auth_check' => Auth::check(),
        'user' => Auth::user(),
    ];
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
