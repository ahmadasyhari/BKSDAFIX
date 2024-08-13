<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');
Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::delete('/admin/menu/force-delete/{id}', [MenuController::class, 'forceDelete'])->name('menu.forceDelete');
Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
