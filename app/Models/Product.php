<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    // protected $table = 'Products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'ar_model',
        'color'
    ];

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }
    public function categoryProducts(): HasMany
    {
        return $this->hasMany(CategoryProduct::class);
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');  // not 'App\Product'
    }

}
