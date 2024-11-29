<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Waktu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    public function run()
    {
        DB::table('waktu')->insert([
            ['jam_mulai'=> '06:50:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '07:00:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '08:00:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '09:00:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '09:40:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '10:00:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '13:00:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '14:00:00',
             'created_at' => now(),
            'updated_at' => now(),
            ],
            ['jam_mulai'=> '15:40:00',
            'created_at' => now(),
            'updated_at' => now(),
            ],

        ]);
    
    }
}

