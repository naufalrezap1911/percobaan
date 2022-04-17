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

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('role:pemilik')->group(function () {
        Route::get('/pemilik', fn () => 'ini halaman pemilik');
    });

    Route::middleware('role:pekerja')->group(function () {
        Route::get('/pekerja', fn () => 'ini halaman pekerja');
    });
});
