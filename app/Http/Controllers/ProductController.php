<?php

namespace App\Http\Controllers;

use App\Models\Product;                
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::create($validated);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        $product->update($validated);
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);

    }

    public function popular()
    {
        $products = \App\Models\Product::inRandomOrder()->take(10)->get();

        return view('welcome', compact('products'));
    }

    
    public function shop()
    {
        $products = Product::with('reviews')->get();

        return view('shop', compact('products'));
    }

    public function userShop(Request $request)
    {
        // Start a query to fetch products with their reviews
        $query = Product::with('reviews');

        // Filter by search term if provided
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Get the final filtered products
        $products = $query->get();

        // Return the logged-in shop view with products
        return view('components.shop', compact('products'));
    }


}
