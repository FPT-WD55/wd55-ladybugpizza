<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'attributes',
        'toppings',
        'price',
        'discount_price',
        'quantity',
        'amount',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getAttributesAttribute()
    {
        return json_decode($this->attributes, true);
    }

    public function getToppingsAttribute()
    {
        return json_decode($this->toppings, true);
    }    
}
