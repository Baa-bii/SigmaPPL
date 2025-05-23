<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal'; // Primary key
    public $incrementing = false; // Karena `id_jadwal` bukan auto-increment
    protected $keyType = 'string'; // Tipe data primary key
    protected $fillable = ['id_jadwal','hari', 'kelas', 'id_waktu', 'id_TA', 'id_ruang', 'kode_mk', 'kode_prodi'];

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
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }

    // Relasi ke model ProgramStudi
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }

    // Relasi ke model SemesterAktif
    public function semesterAktif()
    {
        return $this->belongsTo(SemesterAktif::class, 'id_TA', 'id');
    }

    public function irs()
    {
        return $this->hasMany(IRS::class, 'id_jadwal','id_jadwal');
    }
    // public function irs()
    // {
    //     return $this->hasMany(IRS::class, 'kode_mk', 'kode_mk');
    // }
    public function khs()
    {
        return $this->hasMany(KHS::class, 'id_jadwal');
    }

}
