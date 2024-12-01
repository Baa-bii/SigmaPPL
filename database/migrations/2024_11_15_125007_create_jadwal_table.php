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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->string('id_jadwal')->primary();
            $table->string('hari');
            $table->string('kelas');
            $table->unsignedBigInteger('id_waktu');
            $table->foreign('id_waktu')->references('id')->on('waktu')->onDelete('cascade');
            $table->unsignedBigInteger('id_TA')->nullable();
            $table->foreign('id_TA')->references('id')->on('semester_aktif')->onDelete('cascade');
            $table->unsignedBigInteger('id_ruang');
            $table->foreign('id_ruang')->references('id')->on('ruang')->onDelete('cascade');
            $table->string('kode_mk');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->string('kode_prodi');
            $table->foreign('kode_prodi')->references('kode_prodi')->on('program_studi')->onDelete('cascade');
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropForeign(['id_waktu']);
            $table->dropForeign(['id_TA']);
            $table->dropForeign(['id_ruang']);
            $table->dropForeign(['kode_mk']);
            $table->dropForeign(['kode_prodi']);
          
        });
        Schema::dropIfExists('jadwal');
    }
};