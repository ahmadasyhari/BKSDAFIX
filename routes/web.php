<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PengumumanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\InformasiController;


Route::get('/', [InformasiController::class, 'index'])->name('home');


// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/logo', function () {
    return view('menu.halaman_logo');
});

Route::get('/simaksi', function () {
    return view('menu.layanan_simaksi');
});

Route::get('/perizinan', function () {
    return view('menu.perizinan');
});

Route::get('/lembaga-konservasi', function () {
    return view('menu.lembaga_konservasi');
});


Route::get('/artikel', [ArtikelController::class, 'showArtikel'])->name('artikel.list');
Route::get('/detailartikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/pengumuman', [PengumumanController::class, 'showPengumuman'])->name('pengumuman.list');
Route::get('/detailpengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
// Route untuk menampilkan menu utama
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
// Route untuk menampilkan submenu dengan tampilan berbeda
Route::get('/submenu/{id}', [MenuController::class, 'subshow'])->name('submenu.show');
Route::get('/view/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
Route::group(['middleware' => ['auth']], function () {
    // Rute untuk Menu
    Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::delete('/admin/menu/force-delete/{id}', [MenuController::class, 'forceDelete'])->name('menu.forceDelete');
 
    Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('menu.update');


    Route::resource('kategoris', KategoriController::class);


    // Rute untuk Artikel
    Route::get('/admin/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/admin/artikel/store', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/admin/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::delete('admin/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::get('/admin/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/admin/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');

    // Rute untuk Pengumuman
    Route::get('/admin/pengumuman/create', [PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/admin/pengumuman/store', [PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/admin/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::delete('admin/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    Route::get('/admin/pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/admin/pengumuman/{id}', [PengumumanController::class, 'update'])->name('pengumuman.update');

    Route::resource('users', UserController::class);
});




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
