<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingController;
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


Route::get('/',[HomeController::class, 'index'] );

Route::get('/meeting/buatrapat', [MeetingController::class, 'buatRapat']);
Route::get('/meeting/hasil',[MeetingController::class, 'hasilRapat'] );
Route::get('/meeting/hasil/{id}',[MeetingController::class, 'detailRapat'] );
Route::post('/buat-rapat',[MeetingController::class, 'createRapat'] );
Route::get('/meeting/edit/{id}',[MeetingController::class, 'editRapat'] );
Route::get('/meeting/deleteRapat/{id}',[MeetingController::class, 'deleteRapat'] );


Route::view('/jadwal', 'v_jadwal');
Route::view('/dashboard', 'v_dashboard');
Route::view('/absen', 'v_absen');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user',[UserController::class, 'index'] );
    Route::get('/userdetail/{id}',[UserController::class, 'detail'] );
    Route::get('/delete/{id}',[UserController::class, 'delete'] ); 
});
