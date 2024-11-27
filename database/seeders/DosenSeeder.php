<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::updateOrCreate(
            ['nip_dosen' => '199112092024061001'], // Cari berdasarkan nip_dosen
            [
                'nama_dosen' => 'Bambang Susanto, M.Kom',
                'email' => 'bambangss@lecturer.com',
                'dosen' => '1',
                'dosen_wali' => '1',
                'kaprodi' => '0',
                'dekan' => '0',
                'kode_prodi' => 'INF123',
            ]
        );

        Dosen::updateOrCreate(
            ['nip_dosen' => '199112092024061002'], // Cari berdasarkan nip_dosen
            [
                'nama_dosen' => 'Agus Dwi Putra Yudhistira, S.Kom., M.Cs.',
                'email' => 'agusdwi@lecturer.com',
                'dosen' => '1',
                'dosen_wali' => '1',
                'kaprodi' => '0',
                'dekan' => '0',
                'kode_prodi' => 'INF123',
            ]
        );
    }
}
