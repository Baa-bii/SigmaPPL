<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'nip_dosen';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nip_dosen',
        'nama_dosen',
        'email',
        'dosen',
        'dosen_wali',
        'kaprodi',
        'dekan',
        'kode_prodi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email'); // Relasi ke tabel users berdasarkan email
    }
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'nip_dosen', 'nip_dosen');
    }

    // Relasi untuk mendapatkan angkatan unik yang diampu
    public function angkatan()
    {
        return $this->mahasiswa()->select('angkatan')->distinct();
    }
    
    public function matakuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'dosenmatkul', 'nip_dosen', 'kode_mk');
    }
}
