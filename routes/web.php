<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
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



Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');



// Mostrar todas las categorías
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Mostrar el formulario para crear una nueva categoría
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Almacenar una nueva categoría
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Mostrar una categoría específica
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Mostrar el formulario para editar una categoría existente
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Actualizar una categoría existente
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

// Eliminar una categoría
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
