<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk', 'kode_prodi', 'created_at', 'updated_at'];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosenmatkul', 'kode_mk', 'nip_dosen');
    }
    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'irs', 'kode_mk', 'nim')
            ->withPivot('status', 'status_mata_kuliah', 'id_TA', 'id_riwayat_TA')
            ->withTimestamps();
    }

}
