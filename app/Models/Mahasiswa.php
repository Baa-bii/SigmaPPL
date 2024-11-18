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
        'email',
        'angkatan',
        'jalur_masuk',
        'no_hp',
        'jenis_kelamin',
        'kode_prodi',
        'nip_dosen',
    ];

    /**
     * Relasi ke tabel users
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email'); // Relasi berdasarkan email
    }
}
