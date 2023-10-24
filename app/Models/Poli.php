<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $table = 'poli';
    protected $fillable = ['nama_poli'];
    protected $primarykey = 'id_poli';
    public $timestamps = false;
}
