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
        Schema::create('semester_aktif', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik');
            $table->integer('semester');
            $table->string('status')->default('Belum Registrasi');
            $table->string('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->boolean('is_active')->default(false); // Menambahkan kolom untuk menandai semester aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('semester_aktif', function (Blueprint $table) {
            $table->dropForeign(['nim']); 
        });
        Schema::dropIfExists('semester_aktif');
    }
};
