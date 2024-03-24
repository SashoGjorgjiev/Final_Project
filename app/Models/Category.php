<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Discount;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = ['name'];
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    public function discount()
    {
        return $this->hasMany(Discount::class);
    }
}
