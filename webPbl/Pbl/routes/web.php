<?php

use App\Models\persyaratan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HaydayController;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\PersyaratanController;

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

Route::get('/', [HaydayController::class, 'hometamu']);
// Dashboard
Route::get('/homepage', [HaydayController::class, 'index']);
Route::get('/homepage', [SensorDataController::class, 'showLatestData'])->name('homepage');
// Menampilkan halaman dashboard.

Route::get('/Instansi/{id}', [HaydayController::class, 'detail']);
// Menampilkan detail film berdasarkan ID.

// CRUD Instansi
Route::get('/Instansis/data', [HaydayController::class, 'data'])->middleware('auth')->name('Instansis.data');

// Memerlukan otentikasi untuk membaca data film.

Route::get('/Instansis/create', [HaydayController::class, 'create'])->middleware('auth');
// Memerlukan otentikasi untuk menampilkan halaman pembuatan film.

Route::post('/Instansi/store', [HaydayController::class, 'store'])->middleware('auth');
// Memerlukan otentikasi untuk menyimpan data film baru.


Route::get('/Instansi/{id}/edit', [HaydayController::class, 'edit'])->middleware('auth');
// Memerlukan otentikasi untuk menampilkan halaman pengeditan film berdasarkan ID.

Route::put('/Instansi/{id}/edit', [HaydayController::class, 'update'])->middleware('auth');
// Memerlukan otentikasi untuk menyimpan perubahan pada data film berdasarkan ID.

Route::get('/Instansi/delete/{id}', [HaydayController::class, 'delete'])->middleware('auth');
// Memerlukan otentikasi untuk menghapus data film berdasarkan ID.


// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
// Menampilkan formulir login, hanya dapat diakses oleh tamu.
// Memberikan nama 'login' pada rute untuk referensi lebih mudah.
// Memerlukan pengguna untuk menjadi tamu (belum login).

Route::post('/login', [LoginController::class, 'authenticate']);
// Memproses permintaan login.
Route::post('/logout', [LoginController::class, 'logout']);
// Memproses permintaan logout.


Route::get('/persyaratan/create2', [PersyaratanController::class, 'create2'])->middleware(['auth'])->name('persyaratans.create');

Route::get('/data-pendaftar', [PersyaratanController::class, 'pendaftar']);
Route::post('/persyaratan/store2', [PersyaratanController::class, 'store2'])->middleware('web')->middleware('auth');
Route::get('/persyaratan/data', [PersyaratanController::class, 'data'])->middleware('auth')->name('persyaratans.data');
Route::get('/persyaratan/delete/{id}', [PersyaratanController::class, 'delete'])->middleware('auth');

Route::get('/tutorial', [HaydayController::class, 'tutor']);
Route::get('/store', [HaydayController::class, 'toko']);

Route::post('/sensor-data', [SensorDataController::class, 'store']);
Route::get('/sensor-data', function () {
    return response()->json(['message' => 'Use POST method to send data'], 200);
});
Route::get('/sensor-data', [SensorDataController::class, 'index']);