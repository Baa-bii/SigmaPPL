<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = ['hari', 'kelas', 'id_waktu', 'id_TA', 'id_ruang', 'kode_mk', 'kode_prodi'];

    // Relasi ke model Waktu
    public function waktu()
    {
        return $this->belongsTo(Waktu::class, 'id_waktu', 'id');
    }

    public function ruang()
    {
        return $this->belongsTo(RuangKelas::class, 'id_ruang', 'id');
    }

    // Relasi dengan matakuliah menggunakan kode_mk
    public function matakuliah()
    {
<<<<<<< HEAD
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
=======
        return $this->belongsTo(Matakuliah::class, 'kode_mk', 'kode_mk');
>>>>>>> 360f4fe71950aa9f2a9170ef059261534103fab5
    }

    // Relasi ke model ProgramStudi
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }

    // Relasi ke model SemesterAktif
    public function semesterAktif()
    {
        return $this->belongsTo(SemesterAktif::class, 'id_TA');
    }
<<<<<<< HEAD
}
=======

    public function IRS()
    {
        return $this->hasMany(IRS::class, 'id_jadwal');
    }
    public function KHS()
    {
        return $this->hasMany(KHS::class, 'id_jadwal');
    }
}
>>>>>>> 360f4fe71950aa9f2a9170ef059261534103fab5
