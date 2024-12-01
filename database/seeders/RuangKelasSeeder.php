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
                
                'nama' => '101',
                'gedung' => 'E',
                'kapasitas' => 60,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               
                'nama'=>'102',
                'gedung'=>'E',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nama'=>'103',
                'gedung'=>'E',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nama'=>'303',
                'gedung'=>'A',
                'kapasitas'=>50,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nama'=>'101',
                'gedung'=>'K',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               
                'nama'=>'102',
                'gedung'=>'K',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                
                'nama'=>'202',
                'gedung'=>'K',
                'kapasitas'=>40,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               
                'nama'=>'304',
                'gedung'=>'A',
                'kapasitas'=>50,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               
                'nama'=>'204',
                'gedung'=>'A',
                'kapasitas'=>50,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
  
                'nama'=>'201',
                'gedung'=>'B',
                'kapasitas'=>50,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
  
                'nama'=>'Stadion',
                'gedung'=>'OR',
                'kapasitas'=>200,
                'kode_prodi' => 'INF123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
