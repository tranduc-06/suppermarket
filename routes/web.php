<?php

use App\Http\Controllers\Admin\CategoryManagementController;
use App\Http\Controllers\Admin\ProductManagementController;
use App\Http\Controllers\GetLocalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginGoogleController;
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

 Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('checklogin');
    Route::resource('/product-management', ProductManagementController::class);
    Route::resource('/category-management', CategoryManagementController::class);
});

Route::post('district', [GetLocalController::class, 'district'])->name('district');
Route::post('village', [GetLocalController::class, 'village'])->name('village');

Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);