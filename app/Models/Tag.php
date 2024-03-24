<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = ['name'];
    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
}
