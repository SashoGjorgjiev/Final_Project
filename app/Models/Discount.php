<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'amount', 'brand_id', 'category_id', 'tag_id', 'status'];

    public function products()
    {
        return $this->hasMany(Products::class, 'discount_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
