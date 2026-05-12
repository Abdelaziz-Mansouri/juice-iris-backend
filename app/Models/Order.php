<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone',
        'items',
        'total_price',
        'address',
        'status',
    ];

    protected $casts = [
        'items' => 'array',
        'total_price' => 'decimal:2',
    ];
}
