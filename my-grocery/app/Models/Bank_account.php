<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_account extends Model
{
    protected $fillable = ['bank_name', 'account_number'];
    use HasFactory;

}
