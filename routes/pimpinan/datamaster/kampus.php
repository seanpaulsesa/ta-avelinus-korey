<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\datamaster\KampusController;

Route::prefix('kampus')->group(function () {

    Route::controller(KampusController::class)->group(function() {

        // menampilkan semua data kampus semua
        Route::get('/', 'index')->name('pimpinan.kampus.index');

        // show
        Route::get('/{id}/detail', 'show')->name('pimpinan.kampus.show');

    });

});
