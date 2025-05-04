<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\FakultasController;

Route::prefix('fakultas')->group(function () {

    Route::controller(FakultasController::class)->group(function() {

        // menampilkan semua data fakultas semua
        Route::get('/', 'index')->name('pimpinan.fakultas.index');

        // show
        Route::get('{id}/detail', 'show')->name('pimpinan.fakultas.show');


    });

});
