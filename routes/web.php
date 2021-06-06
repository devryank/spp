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

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index'])->middleware(['auth'])->name('mahasiswa.index');
        Route::get('/mahasiswa/{npm}', [App\Http\Controllers\MahasiswaController::class, 'show'])->middleware(['auth'])->name('mahasiswa.show');
        Route::get('/mahasiswa/{npm}/bayar', [App\Http\Controllers\MahasiswaController::class, 'create'])->middleware(['auth'])->name('mahasiswa.create');
        Route::post('/mahasiswa/{npm}/store', [App\Http\Controllers\MahasiswaController::class, 'store'])->middleware(['auth'])->name('mahasiswa.store');
        Route::delete('/mahasiswa/{npm}/destroy/{id}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])->middleware(['auth'])->name('mahasiswa.destroy');
    });

require __DIR__ . '/auth.php';
