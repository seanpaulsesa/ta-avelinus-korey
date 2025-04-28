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
        Schema::create('program_studis', function (Blueprint $table) {
            $table->id();
            
            // $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade');
            
            $table->unsignedBigInteger('fakultas_id')->nullable();
            $table->foreign('fakultas_id')->references('id')->on('fakultas')->onDelete('set null');
            
            $table->string('nama_program_studi');
            $table->text('keterangan')->nullable();
            
            $table->timestamps();
            $table->softDeletes(); // Soft delete

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_studis');
    }
};
