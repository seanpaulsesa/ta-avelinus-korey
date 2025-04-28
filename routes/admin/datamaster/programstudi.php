<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\ProgramStudiController;

Route::prefix('programstudi')->group(function () {

    Route::controller(ProgramStudiController::class)->group(function() {

        // menampilkan semua data programstudi semua
        Route::get('/', 'index')->name('admin.programstudi.index');
        
        // menampilkan formulir tambah programstudi semua
        Route::get('/create', 'create')->name('admin.programstudi.create');

        Route::get('/get-fakultas-by-kampus/{kampus_id}', 'getFakultasByKampus')->name('get.fakultas.by.kampus');


        // store
        Route::post('store', 'store')->name('admin.programstudi.store');

        // show
        Route::get('{id}/detail', 'show')->name('admin.programstudi.show');

        // edit
        Route::get('{id}/edit', 'edit')->name('admin.programstudi.edit');

        // update
        Route::put('{id}/update', 'update')->name('admin.programstudi.update');

        // forceDelete | ForceDeletes > menghapus permanen dari database
        Route::delete('{id}/ForceDelete', 'forceDelete')->name('admin.programstudi.forceDelete');

    });

});
