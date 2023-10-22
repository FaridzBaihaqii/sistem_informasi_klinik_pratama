<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasFactory;
    protected $table = 'tipe_obat';
    protected $fillable = ['nama_tipe'];
    protected $primarykey = 'id_tipe';
    public $timestamps = false;
}
