<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    use HasFactory;

    protected $table = 'khs';

<<<<<<< HEAD
    protected $fillable = ['nim', 'kode_mk','id_jadwal', 'id_TA', 'nilai'];
=======
    protected $fillable = ['nim', 'kode_mk', 'id_irs', 'nilai'];
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26

    /**
     * Relasi ke tabel Mahasiswa.
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }
    public function irs()
    {
        return $this->belongsTo(IRS::class, 'id_irs', 'id');
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
<<<<<<< HEAD
    public function semesterAktif()
    {
        return $this->belongsTo(SemesterAktif::class, 'id_TA', 'id');
    }
    // relasi ke tabel jadwal
    public function Jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id');
    }
=======
    // public function semesterAktif()
    // {
    //     return $this->belongsTo(SemesterAktif::class, 'id_TA', 'id');
    // }
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
}
