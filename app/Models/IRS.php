<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRS extends Model
{
    use HasFactory;

    protected $table = 'irs';

    protected $fillable = ['nim', 'kode_mk', 'id_jadwal','id_TA'];


    /**
     * Relasi ke tabel Mahasiswa.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    /**
     * Relasi ke tabel Mata Kuliah.
     */
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
