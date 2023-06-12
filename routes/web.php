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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/event', function (){
    return ('event');
});

Route::get('/speaker', function () {
    return ('speker');
});

Route::get('/schedule', function () {
    return ('schedule');
});

Route::get('/notifikasi', function () {
    return ('notifikasi');
});