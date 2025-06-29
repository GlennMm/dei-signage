<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ClientController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');