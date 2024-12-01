<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangKelas extends Model
{
    use HasFactory;

    protected $table = 'ruang';

    protected $fillable = ['id', 'nama', 'status', 'gedung', 'kapasitas', 'kode_prodi'];

    public function program_studi()
    {
        return $this->belongsTo(ProgramStudi::class, 'kode_prodi', 'kode_prodi');
    }

    // public function jadwal()
    // {
    //     return $this->hasMany(Jadwal::class, 'id_ruang', 'id');
    // }

    public function jadwal()
    {
    return $this->hasMany(Jadwal::class, 'id_jadwal');
    }

}