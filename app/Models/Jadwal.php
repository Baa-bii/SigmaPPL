<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = ['hari', 'kelas', 'id_waktu', 'id_TA', 'id_ruang', 'kode_mk', 'kode_prodi'];

    public function matakuliah()
    {
    return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }

    public function waktu()
    {
    return $this->belongsTo(Waktu::class, 'id_waktu', 'id');
    }

    public function ruang()
    {
    return $this->belongsTo(RuangKelas::class, 'id_ruang', 'id');  // Pastikan id_ruang di jadwal merujuk pada id di ruang
    }

}