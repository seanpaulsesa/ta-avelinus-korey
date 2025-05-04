<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\anggota\AnggotaController;

Route::prefix('anggota')->group(function () {

    Route::controller(AnggotaController::class)->group(function() {

        // menampilkan semua data anggota baru
        Route::get('/', 'index')->name('pimpinan.anggota');

        // filter status=Baru
        Route::prefix('baru')->group(function () {

            Route::get('/', 'index')->name('pimpinan.anggota.baru');

        });

        // filter status=Pindah Masuk
        Route::prefix('pindahmasuk')->group(function () {

            Route::get('/', 'index')->name('pimpinan.anggota.pindahMasuk');

        });

        // filter status=Pindah Keluar
        Route::prefix('pindahkeluar')->group(function () {

            Route::get('/', 'index')->name('pimpinan.anggota.pindahKeluar');

        });

        // filter status=Pindah Keluar
        Route::prefix('draft')->group(function () {

            Route::get('/', 'index')->name('pimpinan.anggota.draft');

        });

        // filter status=Alumni
        Route::prefix('alumni')->group(function () {

            Route::get('/', 'index')->name('pimpinan.anggota.alumni');

        });
            
        // show
        Route::get('/{id}/detail', 'show')->name('pimpinan.anggota.show');


    });

    

});
