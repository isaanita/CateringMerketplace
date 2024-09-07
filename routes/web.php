<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\CustomerController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Customer Routes
Route::get('search', [CustomerController::class, 'search'])->name('customers.searchCaterings');
Route::post('order', [CustomerController::class, 'order'])->name('customers.order');
Route::get('invoices', [CustomerController::class, 'viewInvoices'])->name('customers.viewInvoices');

// Merchant Routes
Route::middleware('auth')->group(function () {
    Route::get('merchant/dashboard', [MerchantController::class, 'index'])->name('merchants.index');
    Route::get('merchant/manageMenus', [MerchantController::class, 'manageMenus'])->name('merchants.manageMenus');
    Route::get('merchant/orders', [MerchantController::class, 'viewOrders'])->name('merchants.viewOrders');
    Route::post('merchant/storeMenu', [MerchantController::class, 'storeMenu'])->name('merchants.storeMenu');
    Route::put('merchant/updateProfile', [MerchantController::class, 'updateProfile'])->name('merchants.updateProfile');
});


// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
