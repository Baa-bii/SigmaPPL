<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatSemesterAktif extends Model
{
    //
    use HasFactory;

    protected $table = 'riwayat_semester_aktif'; // Nama tabel di database
    protected $fillable = ['tahun_akademik', 'semester', 'status', 'nim']; // Kolom yang bisa diisi massal
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim'); // Relasi berdasarkan email
    }
}
