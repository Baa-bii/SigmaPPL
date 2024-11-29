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
            // Relasi ke Semester Aktif (untuk IRS semester sekarang)
            $table->unsignedBigInteger('id_TA')->nullable();  // Semester Aktif untuk IRS sekarang
            $table->foreign('id_TA')->references('id')->on('semester_aktif')->onDelete('cascade');

            // Relasi ke Riwayat Semester Aktif (untuk IRS semester sebelumnya)
            $table->unsignedBigInteger('id_riwayat_TA')->nullable();  // Semester Aktif untuk IRS sebelumnya
            $table->foreign('id_riwayat_TA')->references('id')->on('riwayat_semester_aktif')->onDelete('cascade');
            $table->timestamps();
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
            $table->dropForeign(['id_TA']);
            $table->dropForeign(['id_riwayat_TA']);
        });
        Schema::dropIfExists('irs');
    }
};
