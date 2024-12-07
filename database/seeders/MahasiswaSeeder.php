<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = Faker::create('id_ID');
    }

    public function run(): void
    {
        // Map angkatan ke NIP dosen
        $angkatanDosen = [
            '2024' => '199112092024061001', // Bambang
            '2022' => '199112092024061001', // Bambang
            '2023' => '199112092024061002', // Agus
            '2021' => '199112092024061002', // Agus
        ];

        // Counter untuk setiap jalur masuk
        $counter = [
            'SNBP' => 1,
            'SNBT' => 1,
            'Mandiri' => 1,
        ];

        // Angkatan yang tersedia
        $angkatanList = array_keys($angkatanDosen);

        // Data Rizelle
        $user = User::where('email', 'rizelle@students.com')->first();
        if ($user && !Mahasiswa::where('email', $user->email)->exists()) {
            Mahasiswa::create([
                'nim' => '24060122140999',
                'nama_mhs' => $user->name,
                'email' => $user->email,
                'angkatan' => '2022',
                'jalur_masuk' => 'Mandiri',
                'no_hp' => '0812' . $this->faker->unique()->numerify('########'),
                'jenis_kelamin' => 'Perempuan',
                'kode_prodi' => 'INF123',
                'nip_dosen' => '199112092024061001', // Bambang
            ]);
        }

        // Mahasiswa Lainnya
        $users = User::where('role', 'mhs')->where('email', '!=', 'rizelle@students.com')->get();

        // Randomisasi mahasiswa untuk setiap angkatan
        $angkatanMahasiswa = [];
        foreach ($angkatanList as $angkatan) {
            $angkatanMahasiswa[$angkatan] = $users->splice(0, 3); // Ambil 5 mahasiswa per angkatan
        }

        foreach ($angkatanMahasiswa as $angkatan => $students) {
            $nipDosen = $angkatanDosen[$angkatan]; // Dapatkan dosen berdasarkan angkatan

            foreach ($students as $user) {
                $jalurMasuk = $this->faker->randomElement(['SNBP', 'SNBT', 'Mandiri']);
                $nim = $this->generateNim($angkatan, $jalurMasuk, $counter);

                Mahasiswa::create([
                    'nim' => $nim,
                    'nama_mhs' => $user->name,
                    'email' => $user->email,
                    'angkatan' => $angkatan,
                    'jalur_masuk' => $jalurMasuk,
                    'no_hp' => '0812' . $this->faker->unique()->numerify('########'),
                    'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
                    'kode_prodi' => 'INF123',
                    'nip_dosen' => $nipDosen,
                ]);
            }
        }
    }

    public function generateNim($angkatan, $jalurMasuk, &$counter)
    {
        $angkatanLastTwoDigits = substr($angkatan, -2);
        $jalurCode = ['SNBP' => 2, 'SNBT' => 3, 'Mandiri' => 4];
        $urut = $counter[$jalurMasuk]++;

        return '240601' . $angkatanLastTwoDigits . '1' . $jalurCode[$jalurMasuk] . str_pad($urut, 4, '0', STR_PAD_LEFT);
    }
}
