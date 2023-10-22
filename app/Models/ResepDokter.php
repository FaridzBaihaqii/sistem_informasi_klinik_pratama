<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepDokter extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'resep_dokter';
    protected $fillable = ['nama_pasien','tgl_pelayanan','diagnosis','nama_obat'];
    protected $primarykey = 'id_resep';
    public $timestamps = false;
}