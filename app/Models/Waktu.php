<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waktu extends Model
{
    use HasFactory;

    protected $table = 'waktu';

    protected $fillable = ['id', 'jam_mulai', 'jam_selesai','tanggal', 'created_at', 'updated_at'];
}
