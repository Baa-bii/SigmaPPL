<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRS extends Model
{
    use HasFactory;

    protected $table = 'irs';
    protected $primaryKey = 'id';
    protected $fillable = ['nim', 'kode_mk', 'id_jadwal', 'id_TA','status', 'status_mata_kuliah'];


    /**
     * Relasi ke tabel Mahasiswa.
     */
    // Relasi dengan Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function KHS()
    {
        return $this->hasOne(KHS::class, 'id');
    }
    
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    }

    /**
     * Relasi ke tabel Semester Aktif.
     */
    public function semesterAktif()
    {
        return $this->belongsTo(SemesterAktif::class, 'id_TA', 'id');
    }

    // relasi ke tabel jadwal
    public function Jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id');
    }
}