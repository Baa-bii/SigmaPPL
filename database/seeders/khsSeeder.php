<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KHS;

class khsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        khsSeeder::create([
            'id' => '1',
            'nim' => '24060122140999',
            'kode_mk' => 'PAIK6102',
            'id_TA' => '1',
            'nilai' => '85',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        
    );
    }
}
