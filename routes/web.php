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

Route::get('/utama', function () {
    return view('halaman');
});
Route::get('/service', function () {
    return view('halamanService');
});
Route::get('/about', function () {
    return view('halamanAbout');
});
Route::get('/contact', function () {
    return view('halamanContact');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
