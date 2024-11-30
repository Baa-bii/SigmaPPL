<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Relasi ke tabel dosen
     */
    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'email', 'email'); // Relasi berdasarkan email
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'email', 'email'); // Relasi berdasarkan email
    }
    
}
