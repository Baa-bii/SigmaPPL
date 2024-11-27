<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    
    use HasFactory;
    // Tentukan nama tabel
    protected $table = 'jadwal';

    protected $fillable = [
        'hari', 'kelas', 'id_waktu', 'id_TA', 'id_ruang', 'kode_mk', 'kode_prodi',
    ];

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    }

    public function waktu()
    {
        return $this->belongsTo(Waktu::class, 'id_waktu', 'id');
    }

    public function ruang()
    {
        return $this->belongsTo(RuangKelas::class, 'id_ruang', 'id');
    }
}
