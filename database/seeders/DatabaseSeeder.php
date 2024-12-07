<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
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

        // Data Rizelle
        User::firstOrCreate([
            'email' => 'rizelle@students.com',
        ], [
            'name' => 'Rizelle Marie Regal',
            'role' => 'mhs',
            'password' => bcrypt('rizelle123'),
        ]);

        // Seeder User Mahasiswa
        $angkatan = ['2024', '2022', '2023', '2021'];
        $nameCount = []; // Untuk menghindari duplikasi email

        foreach ($angkatan as $tahun) {
            for ($i = 1; $i <= 10; $i++) {
                $name = $faker->firstName . ' ' . $faker->lastName;
                $emailBase = strtolower(str_replace(' ', '', $name)) . '@students.com';

                // Cek jika ada nama yang sama, tambahkan angka di belakang email
                if (isset($nameCount[$emailBase])) {
                    $nameCount[$emailBase]++;
                    $email = strtolower(str_replace(' ', '', $name)) . $nameCount[$emailBase] . '@students.com';
                } else {
                    $nameCount[$emailBase] = 1;
                    $email = $emailBase;
                }

                // Buat User Mahasiswa
                User::firstOrCreate([
                    'email' => $email,
                ], [
                    'name' => $name,
                    'role' => 'mhs',
                    'password' => bcrypt("{$name}123"),
                ]);
            }
        }

        // Panggil Seeder Lainnya
        $this->call([
            ProgramStudiSeeder::class,
            DosenSeeder::class,
            RuangKelasSeeder::class,
            MataKuliahSeeder::class,
            MahasiswaSeeder::class,
            SemesterAktifSeeder::class,
            WaktuSeeder::class,
            JadwalSeeder::class,
            IRSSeeder::class,
            KhsSeeder::class,
            DosenMatkulSeeder::class,
        ]);
    }
}
