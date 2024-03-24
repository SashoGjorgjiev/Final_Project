<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price', 'image',  'quantity',
        'size',
        'status',
        'color', 'advise_for_size',
        'guidelines_for_maintenance', 'user_id', 'category_id', 'brand_id', 'tags_id'

    ];
    protected $guarded = ['discount_id', 'id', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
