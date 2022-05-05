<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogsController;
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