<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\KetnilaiController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InputnilaiController;
use App\Models\Kriteria;
use App\Models\Periode;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login.index',  ['title' => 'Halaman Login']);
});

// route login ruwet
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        // Route::resource('/user', UserController::class);
        Route::prefix('user')->group(function() {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::post('/', [UserController::class, 'store'])->name('user.store');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        });
        // Route::resource('/guru', GuruController::class);
        Route::prefix('guru')->group(function() {
            Route::get('/', [GuruController::class, 'index'])->name('guru.index');
            Route::get('/create', [GuruController::class, 'create'])->name('guru.create');
            Route::post('/', [GuruController::class, 'store'])->name('guru.store');
            Route::get('/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
            Route::put('/{id}', [GuruController::class, 'update'])->name('guru.update');
            Route::delete('/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
        });
        // Route::resource('/periode', PeriodeController::class);
        Route::prefix('periode')->group(function() {
            Route::get('/', [PeriodeController::class, 'index'])->name('periode.index');
            Route::post('/', [PeriodeController::class, 'store'])->name('periode.store');
            Route::put('/{id}', [PeriodeController::class, 'update'])->name('periode.update');
            Route::delete('/{id}', [PeriodeController::class, 'destroy'])->name('periode.destroy');
        });
        // Route::resource('/ketnilai', KetnilaiController::class);
        Route::prefix('ketnilai')->group(function() {
            Route::get('/', [KetnilaiController::class, 'index'])->name('ketnilai.index');
            Route::post('/', [KetnilaiController::class, 'store'])->name('ketnilai.store');
            Route::put('/{id}', [KetnilaiController::class, 'update'])->name('ketnilai.update');
            Route::delete('/{id}', [KetnilaiController::class, 'destroy'])->name('ketnilai.destroy');
        });
        
        // Route::resource('/kriteria', KriteriaController::class);
        Route::prefix('kriteria')->group(function() {
            Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
            Route::post('/', [KriteriaController::class, 'store'])->name('kriteria.store');
            Route::put('/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
            Route::delete('/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');
        });
        // Route::resource('/indikator', IndikatorController::class);
        Route::prefix('indikator')->group(function() {
            Route::post('/', [IndikatorController::class, 'store'])->name('indikator.store');
            Route::put('/{id}', [IndikatorController::class, 'update'])->name('indikator.update');
            Route::delete('/{id}', [IndikatorController::class, 'destroy'])->name('indikator.destroy');
        });
        // Route::resource('/pertanyaan', PertanyaanController::class);
        Route::prefix('pertanyaan')->group(function() {
            Route::get('GetIndikatorByKriteria/{id_kriteria}', 'App\Http\Controllers\KriteriaController@GetIndikatorByKriteria');
            Route::post('/', [PertanyaanController::class, 'store'])->name('pertanyaan.store');
            Route::put('/{id}', [PertanyaanController::class, 'update'])->name('pertanyaan.update');
            Route::delete('/{id}', [PertanyaanController::class, 'destroy'])->name('pertanyaan.destroy');
        });

        Route::prefix('inputnilai')->group(function(){
            Route::get('/', [InputnilaiController::class, 'index'])->name('inputnilai.index');
            Route::get('/{guru}/{periode}', [InputnilaiController::class, 'edit'])->name('inputnilai.edit');
            Route::get('/{guru}/{periode}/{kriteria}', [InputnilaiController::class, 'pilih_kriteria'])->name('inputnilai.pilih_kriteria');
            Route::post('/', [InputnilaiController::class, 'store'])->name('inputnilai.store');
        });

        // Route::get('/inputnilai/{guru}/{periode}/edit', "App\Http\Controllers\InputnilaiController@edit")->name('inputnilai.edit');
        // Route::get('/inputnilai/{guru}/{periode}/{kriteria}/pilih_kriteria', "App\Http\Controllers\InputnilaiController@pilih_kriteria")->name('inputnilai.pilih_kriteria');
        // Route::resource('/inputnilai', InputnilaiController::class)->except('edit', 'pilih_kriteria');
    });
});
