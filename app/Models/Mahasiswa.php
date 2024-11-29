<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Nama tabel
    protected $primaryKey = 'nim'; // Primary key
    public $incrementing = false; // Jika primary key bukan auto-increment
    protected $keyType = 'string'; // Jika primary key berupa string

    
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
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip_dosen', 'nip_dosen'); // Relasi berdasarkan email
    }    
    public function programStudi(){
        return $this->belongsTo(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }
    public function semester_aktif()
    {
        return $this->hasOne(SemesterAktif::class, 'nim', 'nim'); // Relasi one-to-one dengan SemesterAktif
    }
    public function matakuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'irs', 'nim', 'kode_mk')
            ->withPivot('status', 'status_mata_kuliah', 'id_TA', 'id_riwayat_TA')
            ->withTimestamps();
    }


   
}
