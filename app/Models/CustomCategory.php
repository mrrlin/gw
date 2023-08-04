<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function categoryProducts(): HasMany
    {
        return $this->hasMany(CategoryProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            'App\Models\Product',
            'category_products',
            'custom_category_id',
            'product_id'
        );
    }
}
