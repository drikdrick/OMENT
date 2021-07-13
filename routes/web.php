<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AbsencesController;
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
Route::get('/undangan/terimaUndangan/{id}', [HomeController::class, 'terimaUndangan']);
Route::get('/undangan/tolakUndangan/{id}', [HomeController::class, 'tolakUndangan']);

Route::get('/meeting/buatrapat', [MeetingController::class, 'buatRapat']);
Route::get('/meeting/anggota/{id}', [MeetingController::class, 'anggotaRapat']);
Route::get('/meeting/hasil',[MeetingController::class, 'hasilRapat'] );
Route::get('/meeting/hasil/{id}',[MeetingController::class, 'detailHasilRapat'] );
Route::get('/meeting/jadwal',[MeetingController::class, 'jadwalRapat'] );
Route::get('/meeting/jadwal/{id}',[MeetingController::class, 'detailJadwalRapat'] );
Route::get('/meeting/edit/{id}',[MeetingController::class, 'editRapat'] );
Route::get('/meeting/deleteRapat/{id}',[MeetingController::class, 'deleteRapat'] );
Route::post('/buat-rapat',[MeetingController::class, 'createRapat'] );
Route::post('/updateRapat',[MeetingController::class, 'updateRapat'] );
Route::get('/meeting/notulensi/{id}',[NoteController::class, 'lihatCatatan'] );
Route::post('/meeting/buatNotulensi/{id}',[NoteController::class, 'buatCatatan'] );
Route::get('/userdetail/{id}',[UserController::class, 'detail'] );
Route::get('/absen', [AbsencesController::class, 'index']);
Route::get('/absen/buatabsen/{id}', [AbsencesController::class, 'buatAbsensi']);
Route::post('/absen/input/{id}', [AbsencesController::class, 'inputAbsensi']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user',[UserController::class, 'index'] );
    Route::get('/delete/{id}',[UserController::class, 'delete'] ); 
});
