<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/crud', function () { return view('crud');})->name('tw-crud');
    Route::get('/companies', function () { return view('companies');})->name('companies');
    Route::prefix('products')->group(function () {
        Route::get('/', function () { return view('products.index');})->name('products.index');
        Route::get('/categories', function () { return view('products.categories');})->name('products.categories');
        Route::get('/units', function () { return view('products.units');})->name('products.units');
    });

});
require __DIR__.'/auth.php';
