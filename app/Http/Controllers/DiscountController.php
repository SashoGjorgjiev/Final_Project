<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('discount.index', compact('discounts'));
    }
    public function edit(Request $request, Discount $discount)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();

        return view('discount.edit', compact('brands', 'categories', 'discount', 'tags'));
    }

    public function create(Request $request, Discount $discount)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('discount.create', compact('brands', 'categories', 'tags', 'discount'));
    }
    public function store(Request $request, Discount $discount)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'amount' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'status' => 'required|in:active,archived',
            'tag_id' => 'required'
        ]);


        Discount::create($validatedData);


        return redirect()->route('admin.discount')->with('success', 'Discount created successfully');
    }


    public function update(Request $request, Discount $discount)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'amount' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'status' => 'required|in:active,archived',
        ]);
        $discount->update($validatedData);
        return redirect()->route('admin.discount')->with('success', 'Discount updated successfully');
    }
}
