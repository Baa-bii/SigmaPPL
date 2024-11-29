<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';

    protected $fillable = ['kode_mk', 'nama_mk', 'sks', 'semester', 'jenis_mk', 'kode_prodi', 'created_at', 'updated_at'];

    // Assuming a Dosen belongs to MataKuliah
    public function dosen()
{
    return $this->belongsTo(Dosen::class, 'dosen_id', 'nip_dosen');
}

}