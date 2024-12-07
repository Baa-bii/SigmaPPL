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
        Schema::create('irs', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade'); 
            $table->string('kode_mk'); 
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->string('id_jadwal')->unique();
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade');
            $table->unsignedBigInteger('id_TA');
            $table->foreign('id_TA')->references('id')->on('semester_aktif')->onDelete('cascade');
            $table->enum('status', ['Sudah Disetujui', 'Belum Disetujui'])->default('Belum Disetujui');
            $table->enum('status_mata_kuliah', ['BARU', 'PERBAIKAN', 'ULANG'])->default('BARU');            
            $table->timestamps();
            $table->unique(['nim', 'kode_mk', 'id_TA']);
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('irs', function (Blueprint $table) {
            $table->dropForeign(['nim']);
            $table->dropForeign(['kode_mk']);
            $table->dropForeign(['id_jadwal']);
            $table->dropForeign(['id_TA']);
        });
        Schema::dropIfExists('irs');
    }
};