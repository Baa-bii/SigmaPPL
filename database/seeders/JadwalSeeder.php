<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run()
    {
        DB::table('jadwal')->insert([
            [
                'hari' => 'Senin',
                'kelas' => 'A',
                'id_waktu' => 1,
                'id_TA' => 1,
                'id_ruang' => 101,
                'kode_mk' => 'MK001',
                'kode_prodi' => 'TI',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}
