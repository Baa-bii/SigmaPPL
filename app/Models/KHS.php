<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    use HasFactory;

    protected $table = 'khs';

    protected $fillable = ['nim', 'id_irs', 'nilai'];


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
    // public function matakuliah()
    // {
    //     return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
    // }

    /**
     * Relasi ke tabel Semester Aktif.
     */

    // public function semesterAktif()
    // {
    //     return $this->belongsTo(SemesterAktif::class, 'id_TA', 'id');
}
