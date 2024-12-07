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
        Schema::table('jadwal', function (Blueprint $table) {
            if (!Schema::hasColumn('jadwal', 'status')) {
                $table->enum('status',['menunggu', 'diajukan', 'disetujui', 'ditolak'])->default('menunggu')->after('kode_prodi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal', function (Blueprint $table) {
            if (Schema::hasColumn('jadwal', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};