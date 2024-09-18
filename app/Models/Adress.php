<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_adresses';

    protected $fillable = [
        'user_id',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'note'
    ];
}
