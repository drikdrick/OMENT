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

Route::view('/buatrapat', 'v_buatrapat');
Route::view('/hasilrapat', 'v_hasilrapat');
Route::view('/user', 'v_user');
Route::view('/jadwal', 'v_jadwal');
Route::view('/dashboard', 'v_dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
