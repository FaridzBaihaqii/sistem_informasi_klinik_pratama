<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepDokter extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'resep_dokter';
    protected $fillable = ['no_rm','id_obat'];
    protected $primarykey = 'id_resep';
    public $timestamps = false;
}