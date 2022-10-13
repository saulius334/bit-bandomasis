<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as homeCon;
use App\Http\Controllers\AdminController as adminCon;
use App\Http\Controllers\ClientController as clientCon;
use App\Http\Controllers\HotelController as hotCon;
use App\Http\Controllers\CountryController as couCon;


Auth::routes();

Route::get('/', [homeCon::class, 'index'])->name('home')->middleware('gate:user');

Route::prefix('user')->name('u_')->group(function () {
    Route::get('/yourTravels', [clientCon::class, 'index'])->name('yourTravels')->middleware('gate:user');
    Route::get('/show/{country}', [clientCon::class, 'show'])->name('show')->middleware('gate:user');
});

Route::prefix('admin')->name('a_')->group(function () {
    Route::get('/requests', [adminCon::class, 'index'])->name('index')->middleware('gate:admin');
    
});

Route::prefix('country')->name('c_')->group(function () {
    Route::get('/', [couCon::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [couCon::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [couCon::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{country}', [couCon::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{country}', [couCon::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{country}', [couCon::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{country}', [couCon::class, 'update'])->name('update')->middleware('gate:admin');
});

Route::prefix('hotel')->name('h_')->group(function () {
    Route::get('/', [hotCon::class, 'index'])->name('index')->middleware('gate:user');
    Route::get('/create', [hotCon::class, 'create'])->name('create')->middleware('gate:admin');
    Route::post('/create', [hotCon::class, 'store'])->name('store')->middleware('gate:admin');
    Route::get('/show/{hotel}', [hotCon::class, 'show'])->name('show')->middleware('gate:user');
    Route::delete('/delete/{hotel}', [hotCon::class, 'destroy'])->name('delete')->middleware('gate:admin');
    Route::get('/edit/{hotel}', [hotCon::class, 'edit'])->name('edit')->middleware('gate:admin');
    Route::put('/edit/{hotel}', [hotCon::class, 'update'])->name('update')->middleware('gate:admin');
});