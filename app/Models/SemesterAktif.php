<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SemesterAktif extends Model
{
    //
    use HasFactory;

    protected $table = 'semester_aktif'; // Nama tabel di database
    protected $fillable = ['tahun_akademik', 'semester', 'status', 'nim']; // Kolom yang bisa diisi massal
    
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_TA');  // Relasi satu ke banyak ke mahasiswa
    }

    public function IRS()
    {
        return $this->hasMany(IRS::class, 'id_TA', 'id');  // Relasi satu ke banyak ke irs
    }

    // Relasi ke RiwayatIRS (RiwayatIRS mengarah ke RiwayatSemesterAktif)
    // public function irs()
    // {
    //     return $this->hasOne(IRS::class, 'id_TA');
    // }
    
}