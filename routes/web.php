<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

// Auth Admin
Route::get('admin/', [AuthController::class, 'formlogin'])->name('admin.index');
Route::get('admin/login', [AuthController::class, 'formlogin'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.post.login');

// Route Akses
Route::group(['middleware' => 'auth'], function () {
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
    Route::get('admin/home', [HomeController::class, 'index'])->name('admin.home');
});
// Logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
