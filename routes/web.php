<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\PdfController;
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
Route::get('/meeting/anggota/{id}', [MeetingController::class, 'anggotaRapat']);
Route::get('/meeting/hasil',[MeetingController::class, 'hasilRapat'] );
Route::get('/meeting/hasil/{id}',[MeetingController::class, 'detailHasilRapat'] );
Route::get('/meeting/hasil/download/{id}',[MeetingController::class, 'printPdf'] );
Route::get('/meeting/jadwal',[MeetingController::class, 'jadwalRapat'] );
Route::get('/meeting/jadwal/{id}',[MeetingController::class, 'detailJadwalRapat'] );
Route::get('/user/{id}',[UserController::class, 'detail'] );
Route::get('/user.updateProfile',[UserController::class, 'updateProfile'] ); 
Route::post('/user/edit/editPassword',[UserController::class, 'editPassword'] ); 
Route::post('/user/edit/editProfile',[UserController::class, 'editProfile'] ); 
Route::get('/user/edit/{id}',[UserController::class, 'edit'] );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user',[UserController::class, 'index'] ); 
    // Route::get('/delete/{id}',[UserController::class, 'delete'] ); 
});

Route::middleware(['auth', 'kaprodi'])->group(function () {
    Route::get('/meeting/buatrapat', [MeetingController::class, 'buatRapat']);
    Route::get('/meeting/edit/{id}',[MeetingController::class, 'editRapat'] );
    Route::get('/meeting/deleteRapat/{id}',[MeetingController::class, 'deleteRapat'] );
    Route::post('/buat-rapat',[MeetingController::class, 'createRapat'] );
    Route::post('/updateRapat',[MeetingController::class, 'updateRapat'] );

    Route::get('meeting/hasil/terimaHasilRapat/{id}', [NoteController::class, 'acceptHasilRapat']);
    Route::post('meeting/hasil/tolakHasilRapat', [NoteController::class, 'rejectHasilRapat']);
});

Route::middleware(['auth', 'dosen'])->group(function () {
    // Route::get('/absen', [AbsencesController::class, 'index']);
    Route::get('/absen/buatabsen/{id}', [AbsencesController::class, 'buatAbsensi']);
    Route::post('/absen/input/{id}', [AbsencesController::class, 'inputAbsensi']);
    Route::get('/meeting/notulensi/{id}',[NoteController::class, 'lihatCatatan'] );
    Route::post('/meeting/buatNotulensi',[NoteController::class, 'buatCatatan'] );
    Route::get('/undangan/terimaUndangan/{id}', [HomeController::class, 'terimaUndangan']);
    Route::post('/undangan/tolakUndangan', [HomeController::class, 'tolakUndangan']);
});
