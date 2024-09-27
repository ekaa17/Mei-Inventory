<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'cekrole:Admin,Karyawan'], function() {
    // Route::get('/dashboard', [LoginController::class, 'dashboard']);
    Route::get('/dashboard', function () {
        return view('pages/dashboard');
    });
    Route::resource('/data-product', ProductController::class)->names('data-product');
    Route::resource('/data-staff', StaffController::class)->names('data-staff');
    Route::resource('/inventory', InventoryController::class)->names('inventory');
});


