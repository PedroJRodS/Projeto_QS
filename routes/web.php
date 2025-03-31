<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\RelatoController;
use App\Http\Controllers\PainelAdminController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // achados e perdidos
    Route::resource('items', ItemController::class);
    Route::resource('reports', RelatoController::class);
    Route::get('/adminPanel', [PainelAdminController::class, 'index'])->name('adminPanel');
    Route::resource('categories', CategoriaController::class);
    Route::resource('locations', LocalController::class);
});

require __DIR__ . '/auth.php';
