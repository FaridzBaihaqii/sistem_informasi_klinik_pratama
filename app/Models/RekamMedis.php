<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = ['id_pasien','id_dokter','ruangan','tgl_pelayanan','keluhan_rm','diagnosis','foto_pasien'];
    protected $primarykey = 'no_rm';
    public $timestamps = false;
}
