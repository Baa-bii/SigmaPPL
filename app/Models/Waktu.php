<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;

    protected $table = 'waktu';

    protected $fillable = ['id', 'jam_mulai', 'jam_selesai','tanggal', 'created_at', 'updated_at'];

    // Relasi dengan Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_waktu', 'id');
    }
}

