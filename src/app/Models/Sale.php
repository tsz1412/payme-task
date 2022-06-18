<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected  $fillable = [
      'name', 'price', 'currency', 'sale_number', 'payment_link'
    ];
}
