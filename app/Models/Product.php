<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'discount',
        'description',
        'image',
        'category_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount' => 'integer',
        'category_id' => 'integer',
    ];

    protected $appends = ['final_price'];

    public function getFinalPriceAttribute()
    {
        if ($this->discount > 0) {
            return $this->price - ($this->price * ($this->discount / 100));
        }
        return $this->price;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
