<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Dosen
        User::create([
            'name' => 'Bambang Susanto, M.Kom',
            'email' => 'bambangss@lecturer.com',
            'role' => 'dosen',
            'password' => bcrypt('bambang123'),
        ]);

        User::create([
            'name' => 'Agus Dwi Putra Yudhistira, S.Kom., M.Cs.',
            'email' => 'agusdwi@lecturer.com',
            'role' => 'dosen',
            'password' => bcrypt('agus123'),
        ]);

        // User Akademik, Dekan, Kaprodi
        User::create([
            'name' => 'Saipul Jamil',
            'email' => 'akademik@lecturer.com',
            'role' => 'akademik',
            'password' => bcrypt('akademik123'),
        ]);

        User::create([
            'name' => 'Della Mutiara',
            'email' => 'dekan@lecturer.com',
            'role' => 'dekan',
            'password' => bcrypt('dekan123'),
        ]);

        User::create([
            'name' => 'Agus Santoso',
            'email' => 'kaprodi@lecturer.com',
            'role' => 'kaprodi',
            'password' => bcrypt('kaprodi123'),
        ]);

        // User Mahasiswa
        $faker = Faker::create();
        $angkatan = [
            '2024' => 'bambangss@lecturer.com',
            '2022' => 'bambangss@lecturer.com',
            '2023' => 'agusdwi@lecturer.com',
            '2021' => 'agusdwi@lecturer.com',
        ];

        foreach ($angkatan as $tahun => $dosenEmail) {
            for ($i = 1; $i <= 50; $i++) {
                $nim = $tahun . str_pad($i, 3, '0', STR_PAD_LEFT);
                $nama = $faker->name();
                $email = strtolower(str_replace(' ', '', $nama)) . '@students.com';

                User::create([
                    'name' => $nama,
                    'email' => $email,
                    'role' => 'mhs',
                    'password' => bcrypt(strtolower(str_replace(' ', '', $nama)) . '123'),
                ]);
            }
        }

        // Panggil Seeder lainnya di sini
        $this->call([
            ProgramStudiSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
        ]);
    }
}
