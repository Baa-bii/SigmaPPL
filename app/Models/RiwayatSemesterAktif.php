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
        return $this->hasMany(Mahasiswa::class, 'id_riwayat_TA');  // Relasi satu ke banyak ke mahasiswa
    }
    public function irs()
    {
        return $this->hasMany(IRS::class, 'id_riwayat_TA');
    }
}
