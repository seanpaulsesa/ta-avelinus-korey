<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\FakultasController;

Route::prefix('fakultas')->group(function () {

    Route::controller(FakultasController::class)->group(function() {

        // menampilkan semua data fakultas semua
        Route::get('/', 'index')->name('admin.fakultas.index');
        
        // menampilkan formulir tambah fakultas semua
        Route::get('/create', 'create')->name('admin.fakultas.create');

        // store
        Route::post('store', 'store')->name('admin.fakultas.store');

        // show
        Route::get('{id}/detail', 'show')->name('admin.fakultas.show');

        // edit
        Route::get('{id}/edit', 'edit')->name('admin.fakultas.edit');

        // update
        Route::put('{id}/update', 'update')->name('admin.fakultas.update');

        // forceDelete | ForceDeletes > menghapus permanen dari database
        Route::delete('{id}/ForceDelete', 'forceDelete')->name('admin.fakultas.forceDelete');

    });

});
