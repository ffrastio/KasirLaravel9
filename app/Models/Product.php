<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_product', 'category_id', 'image', 'barcode', 'sell_price', 'buy_price', 'latest_price', 'stock', 'quantity'
    ]
}
