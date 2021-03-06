<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;
use App\Mail\LogsMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\OctaveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;


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
Route::get('/logs/{name}', [LogsController::class, 'show']);
Route::get('/export/logs', [LogsController::class, 'exportCsv']);

Route::get('/email', [EmailController::class, 'email']);

Route::post('/values', [OctaveController::class, 'values'])->name("values");   

Route::get('/carbody', function () {
    return view("welcome");
});

Route::post('/carbody', [OctaveController::class, 'body'])->name("carbody");


Route::get('/cmd', function () {
    return view("welcome");
});

Route::post('/cmd', [OctaveController::class, 'command'])->name("cmd");

Route::post('/name', [UserController::class, 'user'])->name("name");
Route::get('/users', [UserController::class, 'all']);

Route::get('/session/get', [SessionController::class, 'getSession'])->name("session.get");
Route::get('/session/set', [SessionController::class, 'storeSession'])->name("session.store");
Route::get('/session/remove', [SessionController::class, 'deleteSession'])->name("session.delete");
