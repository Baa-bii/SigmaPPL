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
        Schema::create('khs', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade'); 
            $table->string('kode_mk'); 
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
<<<<<<< HEAD:database/migrations/2024_11_15_133941_create_khs_table.php
            $table->string('id_jadwal'); 
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade');
            $table->unsignedBigInteger('id_TA');
            $table->foreign('id_TA')->references('id')->on('semester_aktif')->onDelete('cascade');
=======
            // $table->unsignedBigInteger('id_TA');
            // $table->foreign('id_TA')->references('id')->on('riwayat_semester_aktif')->onDelete('cascade');
            // Relasi ke IRS (indeks rencana studi)
            $table->unsignedBigInteger('id_irs'); 
            $table->foreign('id_irs')->references('id')->on('irs')->onDelete('cascade');
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26:database/migrations/2024_11_17_133941_create_khs_table.php
            $table->string('nilai'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khs', function (Blueprint $table) {
            $table->dropForeign(['nim']);
            $table->dropForeign(['kode_mk']);
<<<<<<< HEAD:database/migrations/2024_11_15_133941_create_khs_table.php
            $table->dropForeign(['id_jadwal']);
            $table->dropForeign(['id_TA']);
=======
            $table->dropForeign(['id_irs']);
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26:database/migrations/2024_11_17_133941_create_khs_table.php
        });
        Schema::dropIfExists('khs');
    }
};
