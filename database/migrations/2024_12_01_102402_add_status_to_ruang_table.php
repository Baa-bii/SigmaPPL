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
        Schema::table('ruang', function (Blueprint $table) {
            if (!Schema::hasColumn('ruang', 'status')) {
                $table->string('status')->default('menunggu')->after('kode_prodi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ruang', function (Blueprint $table) {
            if (Schema::hasColumn('ruang', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
