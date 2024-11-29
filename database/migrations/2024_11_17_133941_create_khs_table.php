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
            // $table->unsignedBigInteger('id_TA');
            // $table->foreign('id_TA')->references('id')->on('riwayat_semester_aktif')->onDelete('cascade');
            // Relasi ke IRS (indeks rencana studi)
            $table->unsignedBigInteger('id_irs'); 
            $table->foreign('id_irs')->references('id')->on('irs')->onDelete('cascade');
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
            $table->dropForeign(['id_irs']);
        });
        Schema::dropIfExists('khs');
    }
};
