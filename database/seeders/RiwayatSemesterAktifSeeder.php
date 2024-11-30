<!-- <?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB; -->


// class RiwayatSemesterAktifSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         // Ambil semua data dari semester_aktif
//         // $semesterAktif = DB::table('semester_aktif')->get();

//     //     foreach ($semesterAktif as $record) {
//     //         // Logika: Jika tahun ajaran berubah (misalnya bukan tahun ajaran saat ini), pindahkan ke riwayat_semester_aktif
//     //         $tahunAjaranSekarang = '2024/2025 Ganjil'; // Ganti dengan tahun ajaran sekarang

//     //         if ($record->tahun_akademik !== $tahunAjaranSekarang) {
//     //             // Pindahkan ke tabel riwayat_semester_aktif
//     //             DB::table('riwayat_semester_aktif')->insert([
//     //                 'tahun_akademik' => $record->tahun_akademik,
//     //                 'semester' => $record->semester,
//     //                 'status' => $record->status,
//     //                 'nim' => $record->nim,
//     //                 'created_at' => $record->created_at,
//     //                 'updated_at' => $record->updated_at,
//     //             ]);

//     //             // Hapus dari tabel semester_aktif
//     //             DB::table('semester_aktif')->where('id', $record->id)->delete();
//     //         }
//     //     }
//     // }
// }
