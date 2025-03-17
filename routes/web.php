<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
