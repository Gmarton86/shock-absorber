<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;
use App\Mail\LogsMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\OctaveController;


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


Route::post('/logs', [LogsController::class, 'store']);
Route::get('/logs', [LogsController::class, 'index']);
Route::get('/logs/{username}', [LogsController::class, 'show']);
Route::get('/export/logs', [LogsController::class, 'exportCsv']);

Route::get('/email', [EmailController::class, 'email']);


Route::get('/wheel', function () {
    return view("welcome");
});

Route::post('/wheel', [OctaveController::class, 'wheel'])->name("wheel");
Route::post('/wheel2', [OctaveController::class, 'wheel2'])->name("wheel2");   

Route::get('/carbody', function () {
    return view("welcome");
});

Route::post('/carbody', [OctaveController::class, 'body'])->name("carbody");


Route::get('/cmd', function () {
    return view("welcome");
});

Route::post('/cmd', [OctaveController::class, 'command'])->name("cmd");
