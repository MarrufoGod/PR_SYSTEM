<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\Auth\CustomLoginController;

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






Route::get('/register', [CustomRegisterController::class, 'create'])->name('register');
Route::post('/register', [CustomRegisterController::class, 'store']);

Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login.custom');


Route::get('/dashboard/contratista', fn() => view('contratista.dashboard'))->name('contratista.dashboard');
Route::get('/dashboard/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
