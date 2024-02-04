<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product', 'product_slug');
    }

    public function scopeWithCategoryAndImages($query, $productSlug)
    {
        return $query->with('category')
            ->with('productImages')
            ->where('product_slug', $productSlug)
            ->first();
    }
}
