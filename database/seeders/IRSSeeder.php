<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IRSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('irs')->insert([
            [
                'nim' => '24060122140999', // Pastikan NIM ini ada di tabel 'mahasiswa'
                'kode_mk' => 'PAIK6102', // Pastikan kode ini ada di tabel 'matakuliah'
                'id_TA' => 1, // Pastikan ID ini ada di tabel 'semester_aktif'
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '24060122140999',
                'kode_mk' => 'PAIK6702',
                'id_TA' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '24060122140999',
                'kode_mk' => 'PAIK6406',
                'id_TA' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '24060122140999',
                'kode_mk' => 'PAIK6404',
                'id_TA' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '24060122140999',
                'kode_mk' => 'PAIK6301',
                'id_TA' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '24060122140999',
                'kode_mk' => 'PAIK65204',
                'id_TA' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
