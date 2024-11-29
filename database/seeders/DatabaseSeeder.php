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
        $faker = Faker::create('id_ID');

        // Seeder User Dosen
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

        // Seeder User Akademik, Dekan, Kaprodi
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

        User::create([
            'name' => 'Rizelle Marie Regal',
            'email' => 'rizelle@students.com',
            'role' => 'mhs',
            'password' => bcrypt('rizelle123'),
        ]);

        // Seeder User Mahasiswa
        $angkatan = ['2024', '2022', '2023', '2021'];
        foreach ($angkatan as $tahun) {
            for ($i = 1; $i <= 50; $i++) {
                $name = $faker->name;
                $nim = $tahun . str_pad($i, 3, '0', STR_PAD_LEFT);
                $email = strtolower(str_replace(' ', '', $name)) . $nim . '@students.com';

                // Buat User Mahasiswa
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'role' => 'mhs',
                    'password' => bcrypt("{$name}123"),
                ]);
            }
        }

        // Panggil Seeder lainnya
        $this->call([
            ProgramStudiSeeder::class,
            DosenSeeder::class, 
            RuangKelasSeeder::class,
            MataKuliahSeeder::class,
            MahasiswaSeeder::class,
            SemesterAktifSeeder::class,
            RiwayatSemesterAktifSeeder::class,
            WaktuSeeder::class,
            JadwalSeeder::class,
            IRSSeeder::class,
            khsSeeder::class,
        ]);
    }
}