<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('masyarakat.home');
});

Route::get('/register', function () {
    return view('masyarakat.register');
});

Route::get('/status', function () {
    return view('masyarakat.status');
});

Route::get('/detailstatus', function () {
    return view('masyarakat.detailstatus');
});
