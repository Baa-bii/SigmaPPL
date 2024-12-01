<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';

    protected $casts = [
        'kode_mk' => 'string', // Pastikan kode_mk di-cast sebagai string
    ];

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk', 'kode_prodi', 'created_at', 'updated_at'];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosenmatkul', 'kode_mk', 'nip_dosen');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    }
    // Relasi ke IRS
    public function irs()
    {
        return $this->hasMany(IRS::class, 'kode_mk', 'kode_mk');
    }

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }

     // Relasi MataKuliah ke Mahasiswa melalui tabel IRS
     public function mahasiswa()
     {
         return $this->belongsToMany(Mahasiswa::class, 'irs', 'kode_mk', 'nim')
                     ->withPivot('status', 'status_mata_kuliah'); // kolom tambahan di tabel pivot
     }
     
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    }

    // // Relasi many-to-many dengan Mahasiswa
    // public function mahasiswa()
    // {
    //     return $this->belongsToMany(Mahasiswa::class, 'irs', 'kode_mk', 'nim')
    //         ->withPivot('id_TA', 'id_riwayat_TA', 'status', 'status_mata_kuliah') // Kolom tambahan di tabel pivot
    //         ->withTimestamps();
    // }

}