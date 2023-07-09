<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

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

// Route::get('/index.html', function() {
//     return view('index');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/detail-event', function(){
    return view('event.event');
});

Route::get('/home',[WebController::class,'index']);

Route::get('/login',[WebController::class,'login']);

Route::get('/event', function (){
    return view('event');
});

Route::get('/speaker', function () {
    return ('speaker');
});

Route::get('/schedule', function () {
    return ('schedule');
});

Route::get('/notifikasi', function () {
    return ('notifikasi');
});

Route::get('/admin', function () {
    return ('admin');
});
