<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::create([
            'nip_dosen' => '199112092024061001',
            'nama_dosen' => 'Bambang Susanto',
            'email' => 'dosen@gmail.com', // Relasi ke tabel users
            'dosen' => '1',
            'dosen_wali' => '1',
            'kaprodi' => '0',
            'dekan' => '0',
            'kode_prodi' => 'INF123',
        ]);
    }
}
