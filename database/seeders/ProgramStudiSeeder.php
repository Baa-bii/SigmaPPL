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
    }
}
