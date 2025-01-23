<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    const STOCK_STATUS = [
        'in_stock' => 'Op voorraad',
        'low_stock' => 'Bijna uitverkocht',
        'out_of_stock' => 'Uitverkocht',
        'coming_soon' => 'Binnenkort leverbaar'
    ];

    protected $casts = [
        'stock_status' => 'string'
    ];

    protected $fillable = ['name', 'slug', 'cover', 'price', 'description',  'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    public function GetDiscountPriceAttribute()
    {
        if ($this->discount > 0) {
            return $this->price * (1 - $this->discount / 100);
        }
        return $this->price;
    }
}
