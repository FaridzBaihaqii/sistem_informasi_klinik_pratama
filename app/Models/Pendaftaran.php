<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = ['id_resepsionis','id_pasien','id_poli','keluhan','tgl_pendaftaran','jadwal_pelayanan','info_janji'];
    protected $primarykey = 'id_pendaftaran';
    public $timestamps = false;
}
