<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = ['nama_pendaftar', 'keluhan', 'tgl_lahir','tgl_pendaftaran','id_poli','jadwal_pelayanan','info_janji', 'status_konfirmasi'];
    protected $primarykey = 'id_pendaftaran';
    public $timestamps = false;
}
