<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    use HasFactory;
    protected $table = 'akun';
    protected $fillable = ['username', 'password', 'peran'];
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $casts = [
        'password' => 'hashed',
    ];
}