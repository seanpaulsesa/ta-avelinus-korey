<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\anggota\AnggotaController;

Route::prefix('anggota')->group(function () {

    Route::controller(AnggotaController::class)->group(function() {

        // menampilkan semua data anggota baru
        Route::get('/', 'index')->name('admin.anggota');

        // filter status=Baru
        Route::prefix('baru')->group(function () {

            Route::get('/', 'index')->name('admin.anggota.baru');

        });

        // filter status=Pindah Masuk
        Route::prefix('pindahmasuk')->group(function () {

            Route::get('/', 'index')->name('admin.anggota.pindahMasuk');

        });

        // filter status=Pindah Keluar
        Route::prefix('pindahkeluar')->group(function () {

            Route::get('/', 'index')->name('admin.anggota.pindahKeluar');

        });

        // filter status=Pindah Keluar
        Route::prefix('draft')->group(function () {

            Route::get('/', 'index')->name('admin.anggota.draft');

        });

        // filter status=Alumni
        Route::prefix('alumni')->group(function () {

            Route::get('/', 'index')->name('admin.anggota.alumni');

        });
            
        // menampilkan formulir tambah anggota baru
        Route::get('/create', 'create')->name('admin.anggota.create');

        // store
        Route::post('/store', 'store')->name('admin.anggota.store');

        Route::get('/create/get-fakultas/{kampus_id}', [AnggotaController::class, 'getFakultas']);
        Route::get('/create/get-program-studi/{fakultas_id}', [AnggotaController::class, 'getProgramStudi']);

        // show
        Route::get('/{id}/detail', 'show')->name('admin.anggota.show');

        // edit
        Route::get('/{id}/edit', 'edit')->name('admin.anggota.edit');

        // update
        Route::put('/{id}/update', 'update')->name('admin.anggota.update');

        // forceDelete | ForceDeletes > menghapus permanen dari database
        Route::delete('/{id}/ForceDelete', 'forceDelete')->name('admin.anggota.forceDelete');

    });

    

});
