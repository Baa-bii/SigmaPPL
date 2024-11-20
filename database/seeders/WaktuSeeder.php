<?php

use Illuminate\Database\Seeder;
use App\Models\Waktu;
use Carbon\Carbon;

class WaktuSeeder extends Seeder
{
    public function run()
    {
        $jamMulai = Carbon::createFromTime(7, 0); // Mulai jam 07:00
        $tanggal = '2024-11-20'; // Tanggal kuliah

        // Loop untuk membuat slot waktu untuk 1 SKS sampai 6 SKS
        for ($i = 1; $i <= 6; $i++) {
            $durasi = $i * 50; // Durasi dalam menit

            // Simpan slot waktu
            Waktu::create([
                'jam_mulai' => $jamMulai->format('H:i'),
                'jam_selesai' => $jamMulai->copy()->addMinutes($durasi)->format('H:i'),
                'tanggal' => $tanggal,
            ]);

            // Tambah waktu mulai untuk jadwal berikutnya
            $jamMulai->addMinutes($durasi);
        }
    }
}
