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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama_mhs');
            $table->string('email')->unique(); 
            $table->string('angkatan');
            $table->string('jalur_masuk');
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->string('kode_prodi');
            $table->foreign('kode_prodi')->references('kode_prodi')->on('program_studi')->onDelete('cascade');
            $table->string('nip_dosen');
            $table->foreign('nip_dosen')->references('nip_dosen')->on('dosen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropForeign(['nip_dosen']);  // Menghapus foreign key
            $table->dropForeign(['kode_prodi']);
        });
        Schema::dropIfExists('mahasiswa');
    }
};
