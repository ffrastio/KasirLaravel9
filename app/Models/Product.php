<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name_product', 'category_id', 'image', 'barcode', 'sell_price', 'buy_price', 'latest_price', 'stock', 'quantity'
    ];

    /**
     * Get the Category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function image(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper('/storage/products/' . $value),
        );
    }
}
