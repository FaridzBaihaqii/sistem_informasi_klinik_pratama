<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    use HasFactory;
    protected $table = 'data_obat';
    protected $fillable = ['nama_obat','stok_obat','id_tipe','tgl_exp','foto_obat'];
    protected $primarykey = 'id_obat';
    public $timestamps = false;
}
