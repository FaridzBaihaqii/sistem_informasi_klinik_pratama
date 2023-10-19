<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $table = 'rekam_medis';
    protected $fillable = ['id_pendaftaran','id_asisten','id_dokter','tgl_pelayanan','keluhan_rm','diagnosis'];
    protected $primarykey = 'no_rm';
    public $timestamps = false;
}
