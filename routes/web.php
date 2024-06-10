<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/admin', function () {
//     return view('admin.index');
// });

Route::controller(UserController::class)->group(function() {
    Route::get('/', 'login')->name('login');
    Route::post('/process/login/admin', function(Request $request) {
        return app()->call('App\Http\Controllers\UserController@processLogin', ['request' => $request, 'role' => 1]);
    });
    Route::post('/process/login/cashier', function(Request $request) {
        return app()->call('App\Http\Controllers\UserController@processLogin', ['request' => $request, 'role' => 2]);
    });
});

//make routes for admincontroller and cashier controller

Route::group(['middleware' => 'auth'], function() {
    Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'index');
    });

    Route::controller(CashierController::class)->group(function() {
        Route::get('/cashier', 'index');
    });

    Route::controller(ProductController::class)->group(function() {
        Route::get('/admin/products', 'index');
    });

    Route::controller(SupplierController::class)->group(function() {
        Route::get('/admin/suppliers', 'index');
    });

    Route::controller(TransactionsController::class)->group(function() {
        Route::get('/admin/transactions', 'index');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/admin/users', 'index');
    });
});

