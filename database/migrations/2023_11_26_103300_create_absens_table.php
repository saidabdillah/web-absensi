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
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->integer('nim');
            $table->string('jurusan');
            $table->string('mata_kuliah_id');
            $table->string('kehadiran');
            $table->string('keterangan')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamp('waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
