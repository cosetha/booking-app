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
    return view('halaman');
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

Route::get('/dada', function () {
    return view('admin.home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')
    ->middleware(['auth','role:Admin'])
    ->group(function () {
        Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index']);

        Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index']);
        Route::get('/service/show', [App\Http\Controllers\ServiceController::class, 'show']);      
        Route::post('/service/store', [App\Http\Controllers\ServiceController::class, 'store']);
        Route::get('/service/destroy/{id}', [App\Http\Controllers\ServiceController::class, 'destroy']);   
        Route::get('/service/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit']);
        Route::post('/service/update/{id}', [App\Http\Controllers\ServiceController::class, 'update']);


        Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index']);
        Route::get('/booking/show', [App\Http\Controllers\BookingController::class, 'show']);      
        Route::post('/booking/store', [App\Http\Controllers\BookingController::class, 'store']);
        Route::get('/booking/destroy/{id}', [App\Http\Controllers\BookingController::class, 'destroy']);   
        Route::get('/booking/edit/{id}', [App\Http\Controllers\BookingController::class, 'edit']);
        Route::post('/booking/update/{id}', [App\Http\Controllers\BookingController::class, 'update']);
});

Route::prefix('home')
    ->middleware(['auth','role:User'])
    ->group(function () {
        Route::get('/mobil', [App\Http\Controllers\CarController::class, 'index']);
        Route::get('/mobil/show', [App\Http\Controllers\CarController::class, 'show']);      
        Route::post('/mobil/store', [App\Http\Controllers\CarController::class, 'store']);
        Route::get('/mobil/destroy/{id}', [App\Http\Controllers\CarController::class, 'destroy']);   
        Route::get('/mobil/edit/{id}', [App\Http\Controllers\CarController::class, 'edit']);
        Route::post('/mobil/update/{id}', [App\Http\Controllers\CarController::class, 'update']);


        Route::get('/order', [App\Http\Controllers\BookingController::class, 'create']);
        Route::get('/order/nota', [App\Http\Controllers\BookingController::class, 'nota']);
        Route::get('/order/show-order', [App\Http\Controllers\BookingController::class, 'showOrder']);
        Route::post('/order/get_layanan', [App\Http\Controllers\BookingController::class, 'layanan']);
        Route::post('/order/store', [App\Http\Controllers\BookingController::class, 'store']);

});
