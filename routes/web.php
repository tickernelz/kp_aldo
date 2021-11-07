<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\SiswaController;
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

// Auth
Route::get('auth/', [AuthController::class, 'formlogin'])->name('auth.index');
Route::get('auth/login', [AuthController::class, 'formlogin'])->name('auth.login');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.post.login');

// Route Akses
Route::group(['middleware' => 'auth'], function () {
    // Home
    Route::get('admin/home', [HomeController::class, 'index'])->name('admin.home');
    // Kelola User
    Route::group(['middleware' => ['can:kelola user']], function () {
        // Kelola Admin
        Route::get('admin/kelola/users/admin', [AdminController::class, 'index'])->name('index.user.admin');
        Route::get('admin/kelola/users/admin/tambah', [AdminController::class, 'tambah_index'])->name('tambah.index.user.admin');
        Route::post('admin/kelola/users/admin/tambah/post', [AdminController::class, 'tambah'])->name('tambah.post.user.admin');
        Route::get('admin/kelola/users/admin/edit/{id}', [AdminController::class, 'edit_index'])->name('edit.index.user.admin');
        Route::post('admin/kelola/users/admin/edit/{id}/post', [AdminController::class, 'edit'])->name('edit.post.user.admin');
        Route::get('admin/kelola/users/admin/hapus/{id}', [AdminController::class, 'hapus'])->name('hapus.user.admin');
        // Kelola Siswa
        Route::get('admin/kelola/users/siswa', [SiswaController::class, 'index'])->name('index.user.siswa');
        Route::get('admin/kelola/users/siswa/tambah', [SiswaController::class, 'tambah_index'])->name('tambah.index.user.siswa');
        Route::post('admin/kelola/users/siswa/tambah/post', [SiswaController::class, 'tambah'])->name('tambah.post.user.siswa');
        Route::get('admin/kelola/users/siswa/edit/{id}', [SiswaController::class, 'edit_index'])->name('edit.index.user.siswa');
        Route::post('admin/kelola/users/siswa/edit/{id}/post', [SiswaController::class, 'edit'])->name('edit.post.user.siswa');
        Route::get('admin/kelola/users/siswa/hapus/{id}', [SiswaController::class, 'hapus'])->name('hapus.user.siswa');
    });
    // Kelola Kategori Buku
    Route::group(['middleware' => ['can:kelola kategori buku']], function () {
        Route::get('admin/kelola/kategori', [KategoriBukuController::class, 'index'])->name('index.kategori');
        Route::get('admin/kelola/kategori/tambah', [KategoriBukuController::class, 'tambah_index'])->name('tambah.index.kategori');
        Route::post('admin/kelola/kategori/tambah/post', [KategoriBukuController::class, 'tambah'])->name('tambah.post.kategori');
        Route::get('admin/kelola/kategori/edit/{id}', [KategoriBukuController::class, 'edit_index'])->name('edit.index.kategori');
        Route::post('admin/kelola/kategori/edit/{id}/post', [KategoriBukuController::class, 'edit'])->name('edit.post.kategori');
        Route::get('admin/kelola/kategori/hapus/{id}', [KategoriBukuController::class, 'hapus'])->name('hapus.kategori');
    });
    // Kelola Kategori Buku
    Route::group(['middleware' => ['can:kelola buku']], function () {
        Route::get('admin/kelola/buku', [BukuController::class, 'index'])->name('index.buku');
        Route::get('admin/kelola/buku/tambah', [BukuController::class, 'tambah_index'])->name('tambah.index.buku');
        Route::post('admin/kelola/buku/tambah/post', [BukuController::class, 'tambah'])->name('tambah.post.buku');
        Route::get('admin/kelola/buku/edit/{id}', [BukuController::class, 'edit_index'])->name('edit.index.buku');
        Route::post('admin/kelola/buku/edit/{id}/post', [BukuController::class, 'edit'])->name('edit.post.buku');
        Route::get('admin/kelola/buku/hapus/{id}', [BukuController::class, 'hapus'])->name('hapus.buku');
    });
});
// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
