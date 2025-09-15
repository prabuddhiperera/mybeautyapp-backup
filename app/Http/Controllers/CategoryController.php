<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // ← Add this
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validated);

        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ]);

        $category->update($validated);

        return response()->json($category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function acne(Request $request)
    {
        // Find the category first
        $category = Category::where('name', 'acne')->firstOrFail();

        // Query products belonging to this category
        $query = Product::where('category_id', $category->id);

        // Optional: Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->get();

        return view('categories.acne', compact('products'));
    }

    public function hyperpigmentation(Request $request)
    {
        $query = Product::whereHas('category', function ($q) {
            $q->where('name', 'hyperpigmentation');
        });

        // Optional: Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $products = $query->get();

        return view('categories.hyperpigmentation', compact('products'));
    }

    public function brightening(Request $request)
    {
        $query = Product::whereHas('category', function ($q) {
            $q->where('name', 'brightening');
        });

        // Optional: Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $products = $query->get();

        return view('categories.brightening', compact('products'));
    }

    public function cleanser(Request $request)
    {
        $search = $request->input('search');

        $products = Product::whereHas('category', function ($q) {
                $q->where('name', 'LIKE', '%Cleanser%')
                ->orWhere('name', 'LIKE', '%Makeup Remover%');
            })
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get();

        return view('categories.cleanser', compact('products'));
    }

    public function moisturizer(Request $request)
    {
        $query = Product::whereHas('category', function ($q) {
            $q->where('name', 'moisturizer');
        });

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $products = $query->get();

        return view('categories.moisturizer', compact('products'));
    }

    public function makeup(Request $request)
    {
        $query = Product::whereHas('category', function ($q) {
            $q->where('name', 'makeup');
        });

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $products = $query->get();

        return view('categories.makeup', compact('products'));
    }


    



}
