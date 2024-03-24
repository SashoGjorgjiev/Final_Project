<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('brands.index', compact('brands'));
    }
    public function create(Request $request, Brand $brand)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('brands.create', compact('categories', 'tags', 'brand'));
    }

    public function store(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'in:active,archived',
            'category_id' => 'required',
            'tag_id' => 'required',
        ]);
        $brand = Brand::create($request->all());

        return redirect()->route('admin.brand')->with('success', 'Brand created successfully');
    }
    public function edit(Request $request, Brand $brand)
    {
        $brand = Brand::findOrFail($brand->id);

        $categories = Category::all();
        $tags = Tag::all();
        $products = Products::where('brand_id', $brand->id)->get();

        return view('brands.edit', compact('brand', 'categories', 'tags', 'products'));
    }


    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'in:active,archived',
        ]);

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;

        $brand->save();

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image file if exists

            // Store the new image
            $imagePath = $request->file('image')->store('brand_images', 'public');

            // Update the product's image path
            $brand->product->image_path = $imagePath;
            $brand->product->save();
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Brand updated successfully.');
    }
}
