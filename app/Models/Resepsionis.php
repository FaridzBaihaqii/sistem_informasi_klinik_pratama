<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resepsionis extends Model
{
    use HasFactory;
    protected $table = 'resepsionis';
    protected $fillable = ['username','nama_resepsionis','no_telp','foto_profil'];
    protected $primarykey = 'id_pasien';
    public $timestamps = false;
}
