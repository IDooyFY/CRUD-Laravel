<?php

use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Models\Mapel;
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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('siswa', SiswaController::class);
Route::resource('kelas', KelasController::class);
Route::resource('mapel', MapelController::class);
Route::resource('guru', GuruController::class);


Route::get('kelas',[KelasController::class,'index'])->name('kelas.index');

Route::get('siswa',[SiswaController::class,'index'])->name('siswa.index');

Route::get('guru',[GuruController::class,'index'])->name('guru');

Route::post('create.kelas',[KelasController::class,'create'])->name('create');

Route::post('create.mapel',[MapelController::class,'create'])->name('create');

Route::post('create.guru',[GuruController::class,'create'])->name('create');

Route::post('create',[SiswaController::class,'create'])->name('create');

Route::get('edit/{id}',[SiswaController::class,'edit'])->name('edit');


