<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = ['keluhan','tgl_pendaftaran','poli','jadwal_pelayanan','info_janji'];
    protected $primarykey = 'id_pendaftaran';
    public $timestamps = false;
}
