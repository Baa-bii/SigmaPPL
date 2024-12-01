<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ProgramStudi;

class ProgramStudiSeeder extends Seeder
{
    public function run()
    {
        ProgramStudi::create([
                'kode_prodi' => 'INF123',
                'nama_prodi' => 'Informatika',
                'fakultas' => 'Sains dan Matematika',
                'akreditasi' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
        ],);
        ProgramStudi::create([
                'kode_prodi' => 'MAT123',
                'nama_prodi' => 'Matematika',
                'fakultas' => 'Sains dan Matematika',
                'akreditasi' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
        ],);
        ProgramStudi::create([
                'kode_prodi' => 'STA123',
                'nama_prodi' => 'Statistika',
                'fakultas' => 'Sains dan Matematika',
                'akreditasi' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
        ],);
        ProgramStudi::create([
                'kode_prodi' => 'BIO123',
                'nama_prodi' => 'Biologi',
                'fakultas' => 'Sains dan Matematika',
                'akreditasi' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
        ],);
        ProgramStudi::create([
                'kode_prodi' => 'Fis123',
                'nama_prodi' => 'Fisika',
                'fakultas' => 'Sains dan Matematika',
                'akreditasi' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
        ],);
        ProgramStudi::create([
                'kode_prodi' => 'KIM123',
                'nama_prodi' => 'Kimia',
                'fakultas' => 'Sains dan Matematika',
                'akreditasi' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
        ],);
        ProgramStudi::create([
                'kode_prodi' => 'ALL123',
                'nama_prodi' => 'Semua Prodi',
                'fakultas' => 'Sains dan Matematika',
                'akreditasi' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
        ],);
    
    }
}
