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
        return $this->hasOne(User::class, 'email', 'email'); // Relasi berdasarkan email
    }
    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'nip_dosen', 'nip_dosen'); // Relasi berdasarkan email
    }    
    public function programStudi(){
        return $this->hasOne(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }
    public function semester_aktif()
    {
        return $this->belongsTo(SemesterAktif::class, 'nim', 'nim'); // Relasi one-to-one dengan SemesterAktif
    }
    // Relasi ke Riwayat Semester Aktif
    public function riwayatSemesterAktif()
    {
        return $this->belongsTo(RiwayatSemesterAktif::class, 'id_riwayat_TA');  // Menghubungkan ke riwayat semester aktif
    }
    //Relasi ke IRS (Indeks Rencana Studi)
    public function irs()
    {
        return $this->hasMany(IRS::class, 'nim', 'nim'); // Relasi one-to-many dengan IRS
    }
    

    // Relasi Mahasiswa ke MataKuliah melalui tabel IRS
    public function mataKuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'irs', 'nim', 'kode_mk')
                    ->withPivot('status', 'status_mata_kuliah'); // kolom tambahan di tabel pivot
    }
    // Pada model Mahasiswa
    public function mataKuliahDitampilkan()
    {
        // Ambil mata kuliah berdasarkan relasi IRS
        return $this->hasManyThrough(MataKuliah::class, Irs::class, 'nim', 'kode_mk', 'nim', 'kode_mk');
    }
}
