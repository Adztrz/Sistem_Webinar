<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EventController;

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
    return view('index', [
        "title" => "Home"
    ]);
});

Route::get('/event', function () {
    return view('event.event', [
        "title" => "Event"
    ]);
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::get('/index.html', function() {
//     return view('index');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::resource('/event', EventController::class);

Route::resource('/regevent', RegeventController::class);

Route::get('/home',[WebController::class,'index']);



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

Route::get('/login',[LoginController::class,'index']);
Route::post('/login',[LoginController::class,'authenticate']);


Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);