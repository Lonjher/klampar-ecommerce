<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_product';

    protected $fillable = [
        'user_id',
        'product_image',
        'slug',
        'product_name',
        'description',
        'first_price',
        'price_sell',
        'quantity',
        'status'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id_user', 'user_id');
    }
}
