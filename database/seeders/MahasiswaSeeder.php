<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $angkatanDosen = [
            '2024' => '199112092024061001', // Bambang
            '2022' => '199112092024061001', // Bambang
            '2023' => '199112092024061002', // Agus
            '2021' => '199112092024061002', // Agus
        ];

        // Mahasiswa Berdasarkan Angkatan
        foreach ($angkatanDosen as $angkatan => $nipDosen) {
            for ($i = 1; $i <= 25; $i++) {
                $nim = $angkatan . str_pad($i, 3, '0', STR_PAD_LEFT);

                // Ambil User dari tabel Users
                $user = User::where('email', 'LIKE', "%{$nim}@students.com")->first();

                // Buat data mahasiswa
                Mahasiswa::create([
                    'nim' => $nim,
                    'nama_mhs' => $user->name, // Gunakan nama dari User
                    'email' => $user->email,  // Gunakan email dari User
                    'angkatan' => $angkatan,
                    'jalur_masuk' => $faker->randomElement(['SNBP', 'SNBT', 'Mandiri']),
                    'no_hp' => '0812' . $faker->unique()->numerify('########'),
                    'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                    'kode_prodi' => 'INF123',
                    'nip_dosen' => $nipDosen,
                ]);
            }
        }

        // Data Terpisah untuk Rizelle
        $user = User::where('email', 'rizelle@students.com')->first();

        Mahasiswa::create([
            'nim' => '24060122140999',
            'nama_mhs' => $user->name,
            'email' => $user->email,
            'angkatan' => '2022',
            'jalur_masuk' => 'Mandiri',
            'no_hp' => '0812' . $faker->unique()->numerify('########'),
            'jenis_kelamin' => 'Perempuan',
            'kode_prodi' => 'INF123',
            'nip_dosen' => '199112092024061001', // Bambang
        ]);
    }
}
