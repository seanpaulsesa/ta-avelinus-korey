<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\ProgramStudiController;

Route::prefix('programstudi')->group(function () {

    Route::controller(ProgramStudiController::class)->group(function() {

        // menampilkan semua data programstudi semua
        Route::get('/', 'index')->name('pimpinan.programstudi.index');
        
        // show
        Route::get('{id}/detail', 'show')->name('pimpinan.programstudi.show');

    });

});
