<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IRS extends Model
{
    use HasFactory;

    protected $table = 'irs';
    protected $primaryKey = 'id';
    protected $fillable = ['nim', 'kode_mk', 'id_TA', 'id_riwayat_TA','status', 'status_mata_kuliah'];

<<<<<<< HEAD
    protected $fillable = ['nim', 'kode_mk', 'id_jadwal','id_TA'];


    /**
     * Relasi ke tabel Mahasiswa.
     */
=======
    // Relasi dengan Mahasiswa
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
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
<<<<<<< HEAD

    // relasi ke tabel jadwal
    public function Jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal', 'id');
=======
    
    public function riwayatSemesterAktif()
    {
        return $this->belongsTo(RiwayatSemesterAktif::class, 'id_riwayat_TA', 'id');
>>>>>>> f03fc4a985f0c6b9c61a22a085fea44175286c26
    }
}
