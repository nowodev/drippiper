<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Customer;
use App\Http\Middleware\CheckIfAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

// Pages
Route::view('/', 'index')->name('home');
Route::view('/product-view', 'product-view')->name('product.view');
Route::view('/checkout', 'checkout')->name('checkout');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::view('/forgotpassword', 'forgotpassword')->name('forgotpassword');
Route::view('/verify', 'verify')->name('verify');
Route::view('/prof', 'prof')->name('prof');
Route::view('/cart', 'cart')->name('cart');
Route::view('/sales', 'sales')->name('sales');
Route::view('/products', 'products')->name('products');

// Admin route
Route::middleware(['auth', CheckIfAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');


    Route::resource('categories', Admin\CategoryController::class)->except('show');

    Route::put('products/{product}/status', [Admin\ProductController::class, 'updateStatus'])
        ->name('products.status');
    Route::resource('products', Admin\ProductController::class);

    Route::resource('orders', Admin\OrderController::class);

    Route::resource('customers', Admin\CustomerController::class)->only('index', 'show');

    Route::resource('transaction', Admin\TransactionController::class)->only('index', 'show');

    // Route::get('settings', [SettingController::class, 'index'])->name('users');

    Route::get('profile', [Admin\ProfileController::class, 'show'])->name('profile.show');

    Route::put('profile', [Admin\ProfileController::class, 'update'])->name('profile.update');
});

// Customer route
Route::middleware('auth')->name('customer.')->group(function () {
    Route::view('/dashboard', 'customer.dashboard')->name('dashboard');

    Route::get('profile', [Customer\ProfileController::class, 'show'])->name('profile.show');

    Route::put('profile', [Customer\ProfileController::class, 'update'])->name('profile.update');
});
