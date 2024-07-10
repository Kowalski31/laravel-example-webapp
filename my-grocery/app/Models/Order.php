<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'payment_type', 
        'status', 
        'address',
        'phone',
        'total_price', 
        'delivery_date',
        'receiver_name',
        'ship_money',
    ];
    use HasFactory;
}
