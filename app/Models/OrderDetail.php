<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_order_detail';

    protected $fillable = [
        'product_id',
        'user_id',
        'adderss_id',
        'quantity',
        'phone_number',
        'total_price',
        'status'
    ];
}
