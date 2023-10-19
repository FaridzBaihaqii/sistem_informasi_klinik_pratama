<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable = ['','nama_resepsionis','no_telp','foto_profil'];
    protected $primarykey = 'id_pasien';
    public $timestamps = false;
}
