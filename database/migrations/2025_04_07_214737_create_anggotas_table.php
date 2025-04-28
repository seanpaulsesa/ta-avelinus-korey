<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('program_studi_id')->nullable();
            $table->foreign('program_studi_id')->references('id')->on('program_studis')->onDelete('set null');
            
            $table->date('tanggal_pendaftaran');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->text('alamat_tinggal')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('kpm')->nullable();
            $table->string('nim')->unique()->nullable();
            $table->string('ktp')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['Baru', 'Pindah Masuk', 'Pindah Keluar', 'Alumni', 'Draft'])->default('Draft');
            $table->integer('alumni')->nullable();
            $table->text('keterangan')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
