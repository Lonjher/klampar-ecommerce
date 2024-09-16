<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sample',
        'description',
        'quantity',
        'deadline'
    ];
    protected $primaryKey = 'id_reservation';
}
