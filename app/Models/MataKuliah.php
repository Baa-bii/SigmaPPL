<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_mk';  // Menentukan primary key yang digunakan di model

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk', 'kode_prodi', 'created_at', 'updated_at'];

    // Assuming a Dosen belongs to MataKuliah
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'nip_dosen');
    }
    // Relasi ke IRS
    public function irs()
    {
        return $this->hasMany(IRS::class, 'kode_mk');
    }
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_mk', 'kode_mk');
    }
    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'irs', 'kode_mk', 'nim') // Definisikan relasi many-to-many dengan tabel pivot 'irs'
            ->withPivot('status', 'status_mata_kuliah', 'id_TA', 'id_riwayat_TA')  // Kolom tambahan yang ada di pivot
            ->withTimestamps(); // Jika ingin mencatat created_at dan updated_at
    }

}