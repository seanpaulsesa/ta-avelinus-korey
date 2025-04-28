<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\KampusController;

Route::prefix('kampus')->group(function () {

    Route::controller(KampusController::class)->group(function() {

        // menampilkan semua data kampus semua
        Route::get('/', 'index')->name('admin.kampus.index');
        
        // menampilkan formulir tambah kampus semua
        Route::get('/create', 'create')->name('admin.kampus.create');

        // store
        Route::post('/store', 'store')->name('admin.kampus.store');

        // show
        Route::get('/{id}/detail', 'show')->name('admin.kampus.show');

        // edit
        Route::get('/{id}/edit', 'edit')->name('admin.kampus.edit');

        // update
        Route::put('/{id}/update', 'update')->name('admin.kampus.update');

        // forceDelete | ForceDeletes > menghapus permanen dari database
        Route::delete('/{id}/ForceDelete', 'forceDelete')->name('admin.kampus.forceDelete');

    });

});
