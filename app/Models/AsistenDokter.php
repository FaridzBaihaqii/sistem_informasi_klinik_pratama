<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenDokter extends Model
{
    use HasFactory;
    protected $table = 'asisten_dokter';
    protected $fillable = ['username','nama_asisten','no_telp','foto_profil'];
    protected $primarykey = 'id_asisten';
    public $timestamps = false;
}
