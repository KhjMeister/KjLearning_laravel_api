<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'price',
        'active',
        // 'category_id'
    ];
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('price', 'quantity');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    // public function price(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => str_replace('.', ',', $value / 100) . '€'
    //     );
    // }

    public function getFormattedPriceAttribute(): string
    {
        return str_replace('.', ',', $this->price / 100) . '€';
    }
    public function rProdctPhoto()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
