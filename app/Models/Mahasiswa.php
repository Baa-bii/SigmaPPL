<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'nama_mhs',
        'angkatan',
        'jalur_masuk',
        'no_hp',
        'jenis_kelamin',
        'kode_prodi',
        'nip_dosen',
    ];
}
