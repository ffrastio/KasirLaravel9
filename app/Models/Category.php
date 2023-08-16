<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name_category', 'description', 'image'
    ];

    /**
     * Get all of the Product for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    
    /**
     * image
     *
     * @return Attribute
     */
    public function image(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper('/storage/categorie/' . $value),
        );
    }
}
