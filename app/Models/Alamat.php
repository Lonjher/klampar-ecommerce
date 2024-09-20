<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_alamat';

    protected $fillable = [
        'user_id',
        'dusun',
        'desa',
        'kecamatan',
        'kabupaten',
        'note'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id_user', 'user_id');
    }
}
