<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
   
    use HasFactory;
    protected $table = 'tb_notulen';
    protected $fillable = ['id_notulen','id_memo_not','isi','created_at','updated_at'];
    protected $primaryKey = 'id_notulen';
}
