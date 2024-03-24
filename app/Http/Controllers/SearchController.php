<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Discount;
use App\Models\Products;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Products::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return response()->json($results);
    }
    public function searchDiscount(Request $request)
    {
        $query = $request->input('query');

        $results = Discount::where('code', 'like', "%{$query}%")
            ->orWhere('amount', 'like', "%{$query}%")
            ->get();

        return response()->json($results);
    }
    public function searchBrand(Request $request)
    {
        $query = $request->input('query');

        $results = Brand::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->get();

        return response()->json($results);
    }
}
