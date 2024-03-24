<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    public function edit(Request $request, Products $product)
    {
        $tags = Tag::all();
        $category = Category::all();
        $brands = Brand::all();
        $discounts = Discount::all();

        return view('products.edit', compact([
            'tags',
            'category',
            'brands',
            'discounts',
            'product'

        ]));
    }

    public function create(Request $request, Products $product)
    {
        $tags = Tag::all();
        $category = Category::all();
        $brands = Brand::all();
        $discounts = Discount::all();
        return view('products.create', compact([
            'tags',
            'category',
            'brands',
            'discounts',
            'product'
        ]));
    }
    public function store(Request $request, Products $product)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'in:active,archived',
            'color' => 'required',
            'size' => 'required',
            'guidelines_for_maintenance' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
            'tags_id' => 'required',
            'image' => 'required',
            'advise_for_size' => 'required',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['tag_id'] = $request->input('tag_id');
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . "." . $extension;
            $path = 'uploads/products/';
            $file->move($path, $filename);
        }
        Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status ?? 'active',
            'color' => $request->color,
            'size' => $request->size,
            'advise_for_size' => $request->advise_for_size,
            'guidelines_for_maintenance' => $request->guidelines_for_maintenance,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'tags_id' => $request->tags_id,
            'image' => $path . $filename,
            'user_id' => Auth::id(),

        ]);
        return redirect()->route('admin.vintage_obleka')->with('success', 'Product created successfully');
    }



    public function update(Request $request, $id, Products $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'in:active,archived',
            'color' => 'required',
            'size' => 'required',
            'guidelines_for_maintenance' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
            'tags_id' => 'required',
        ]);
        $product = Products::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . "." . $extension;
            $path = 'uploads/products/';
            $file->move($path, $filename);

            $validatedData['image'] = $path . $filename;
        }
        $validatedData['status'] = $request->input('status', 'active');
        $validatedData['category_id'] = $request->input('category_id');
        $validatedData['brand_id'] = $request->input('brand_id');

        $product->update($validatedData);

        return redirect()->route('admin.vintage_obleka')->with('success', 'Product updated successfully.');
    }
}
