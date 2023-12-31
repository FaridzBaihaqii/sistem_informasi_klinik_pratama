<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable = ['nama_pasien','jenkel','tgl_lahir','alamat','no_telp','no_bpjs','foto_profil'];
    protected $primarykey = 'id_pasien';
    public $timestamps = false;
}
