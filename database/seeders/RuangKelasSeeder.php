<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RuangKelas;
use Illuminate\Support\Facades\DB;

class RuangKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table ('ruang')->insert([
            [
                'id' => 1,
                'nama' => '101',
                'gedung' => 'E',
                'kapasitas' => 60,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama'=>'102',
                'gedung'=>'E',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama'=>'103',
                'gedung'=>'E',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama'=>'303',
                'gedung'=>'A',
                'kapasitas'=>50,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nama'=>'101',
                'gedung'=>'K',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nama'=>'102',
                'gedung'=>'K',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nama'=>'202',
                'gedung'=>'K',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nama'=>'304',
                'gedung'=>'A',
                'kapasitas'=>50,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
