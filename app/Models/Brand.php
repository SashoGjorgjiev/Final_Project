<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'status', 'tag_id', 'category_id'];
    public function products()
    {
        return $this->hasMany(Products::class, 'brand_id');
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
