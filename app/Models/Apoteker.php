<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoteker extends Model
{
    use HasFactory;
    protected $table = 'apoteker';
    protected $fillable = ['username','nama_apoteker','foto_profil'];
    protected $primarykey = 'id_apoteker';
    public $timestamps = false;
}
