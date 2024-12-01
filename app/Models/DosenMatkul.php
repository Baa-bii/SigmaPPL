<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DosenMatkul extends Model
{
    use HasFactory;

    protected $table = 'dosenmatkul';

    protected $fillable = ['nip_dosen','kode_mk'];

    public function MataKuliah()
    {
        return $this->hasMany(MataKuliah::class, 'kode_mk');
    }
    public function Dosen()
    {
        return $this->hasMany(Dosen::class, 'nip_dosen');
    }
}
