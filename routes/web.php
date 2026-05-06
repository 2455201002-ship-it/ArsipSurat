<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/surat', [ArsipController::class,'index'])->name('surat.index');

    Route::get('/surat/tambah', [ArsipController::class,'create'])->name('surat.create');

    Route::post('/surat/store', [ArsipController::class,'store'])->name('surat.store');

    Route::get('/surat/edit/{id}', [ArsipController::class,'edit'])->name('surat.edit');

    Route::post('/surat/update/{id}', [ArsipController::class,'update'])->name('surat.update');

    Route::get('/surat/hapus/{id}', [ArsipController::class,'destroy'])->name('surat.destroy');

});

require __DIR__.'/auth.php';