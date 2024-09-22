<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'penjual_id',
        'sample',
        'description',
        'quantity',
        'deadline'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function penjual():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
