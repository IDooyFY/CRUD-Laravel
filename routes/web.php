<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
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

Route::get('kelas',[KelasController::class,'index'])->name('kelas.index');

Route::get('siswa',[SiswaController::class,'index'])->name('siswa.index');

Route::post('create',[KelasController::class,'create'])->name('create');

Route::post('create',[SiswaController::class,'create'])->name('create');
