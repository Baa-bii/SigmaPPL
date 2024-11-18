<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $angkatanDosen = [
            '2024' => '199112092024061001', // Bambang
            '2022' => '199112092024061001', // Bambang
            '2023' => '199112092024061002', // Agus
            '2021' => '199112092024061002', // Agus
        ];

        foreach ($angkatanDosen as $tahun => $nipDosen) {
            for ($i = 1; $i <= 50; $i++) {
                $nim = $tahun . str_pad($i, 3, '0', STR_PAD_LEFT);
                $nama = $faker->name();
                $jalurMasuk = $faker->randomElement(['SNBP', 'SNBT', 'Mandiri']);
                $noHp = '0812' . $faker->unique()->numberBetween(10000000, 99999999);

                Mahasiswa::create([
                    'nim' => $nim,
                    'nama_mhs' => $nama,
                    'angkatan' => $tahun,
                    'jalur_masuk' => $jalurMasuk,
                    'no_hp' => $noHp,
                    'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                    'kode_prodi' => 'INF123',
                    'nip_dosen' => $nipDosen,
                ]);
            }
        }
    }
}
