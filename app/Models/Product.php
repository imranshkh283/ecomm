<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'price',
        'discount_price',
        'rating',
        'review_count',
        'image',
        'badge',
        'badge_class',
        'is_featured',
        'is_trending',
        'is_new',
    ];
}
