<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    use HasFactory;
    protected $table = 'tb_lampiran';
    protected $fillable = ['id_lampiran','id_memo','filename','created_at','updated_at'];
    protected $primaryKey = 'id_lampiran';
}
