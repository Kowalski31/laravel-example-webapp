<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_details', 'product_id', 'category_id');
    }

    public function pictures()
    {
        return $this->hasMany(Product_picture::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'product_id', 'cart_id');
    }

    public function product_details()
    {
        return $this->hasMany(Product_detail::class);
    }

    public function order_details()
    {
        return $this->belongsToMany(Order_detail::class, 'product_id', 'order_detail_id');
    }


    use HasFactory;
}
