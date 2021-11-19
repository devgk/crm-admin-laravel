<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Auth\VerificationController;

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

Auth::routes();

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/access-denied', [VerificationController::class, 'accessDenied'])->name('VerificationController.accessDenied');

Route::group(['prefix' => 'product', 'as' => 'product.'], function (){
    Route::get('/', [ProductController::class, 'index'])->name('listing');
    Route::post('/ajax', [ProductController::class, 'dataAjax']);
    Route::get('/add', [ProductController::class, 'add'])->name('add');
    Route::post('/add', [ProductController::class, 'addAction']);
    Route::get('/{slug}', [ProductController::class, 'singleProduct'])->name('singleProduct');
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function (){
    Route::get('/', [CategoryController::class, 'index'])->name('listing');
    Route::post('/ajax', [CategoryController::class, 'dataAjax']);
    Route::get('/add', [CategoryController::class, 'add'])->name('add');
    Route::post('/add', [CategoryController::class, 'addAction']);
});