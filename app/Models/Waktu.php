<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Waktu extends Model
{
    use HasFactory;

    protected $table = 'waktu';
<<<<<<< HEAD
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'jam_mulai', 'sks','tanggal', 'created_at', 'updated_at'];
=======

    protected $fillable = ['id', 'jam_mulai', 'created_at', 'updated_at'];
>>>>>>> c9409dbfab93c6114ccf25f45c46e3176a257bb8

    // Relasi dengan Jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_waktu', 'id');
    }

    public function matakuliah()
{
    return $this->hasOneThrough(
        MataKuliah::class, // Model tujuan
        Jadwal::class,     // Model perantara
        'id_waktu',        // Foreign key pada model Jadwal
        'kode_mk',         // Foreign key pada model MataKuliah
        'id',              // Local key pada model Waktu
        'kode_mk'          // Local key pada model Jadwal
    );
}

public function getJamSelesaiAttribute()
{
    if ($this->jadwal->first()) {
        $jamMulai = Carbon::parse($this->jam_mulai);
        $durasi = $this->jadwal->first()->matakuliah->sks * 50; // Durasi berdasarkan SKS
        return $jamMulai->addMinutes($durasi)->format('H:i:s'); // Format dengan detik
    }

    return null; // Jika tidak ada relasi jadwal
}

}