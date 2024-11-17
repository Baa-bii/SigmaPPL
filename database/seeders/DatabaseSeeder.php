<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'=> 'Bambang Susanto, M.Kom',
            'email'=> 'dosen@gmail.com',
            'role'=> 'dosen',
            'password'=>bcrypt('dosen123')
        ]);

        User::create([
            'name'=> 'Rizzelle Marie Regal',
            'email'=> 'mahasiswa@gmail.com',
            'role'=> 'mhs',
            'password'=>bcrypt('mhs123')
        ]);

        User::create([
            'name'=> 'Saipul Jamil',
            'email'=> 'akademik@gmail.com',
            'role'=> 'akademik',
            'password'=>bcrypt('akademik123')
        ]);

        User::create([
            'name'=> 'Della Mutiara',
            'email'=> 'dekan@gmail.com',
            'role'=> 'dekan',
            'password'=>bcrypt('dekan123')
        ]);

        User::create([
            'name'=> 'Agus Santoso',
            'email'=> 'kaprodi@gmail.com',
            'role'=> 'kaprodi',
            'password'=>bcrypt('kaprodi123')
        ]);
    }
}
