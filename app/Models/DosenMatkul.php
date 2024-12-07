<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DosenMatkul extends Model
{
    use HasFactory;

    protected $table = 'dosenmatkul';

    protected $fillable = ['nip_dosen','kode_mk'];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk');
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nip_dosen');
    }
}