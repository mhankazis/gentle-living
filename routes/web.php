<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Product routes
    Route::resource('products', ProductController::class);
    
    // Transaction routes
    Route::resource('transactions', TransactionController::class);
    
    // Invoice routes
    Route::resource('invoices', InvoiceController::class);
    
    // Order routes - Pemesanan Produk
    Route::resource('orders', OrderController::class);
    
    // Company routes - Data Perusahaan
    Route::resource('companies', CompanyController::class);
    
    // Admin routes - Data Admin
    Route::resource('admins', AdminController::class);
});

require __DIR__.'/auth.php';
