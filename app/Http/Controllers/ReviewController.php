<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of all reviews (with customer + product).
     */
    public function index()
    {
        return response()->json(
            Review::with(['customer', 'product'])->latest()->get()
        );
    }

    /**
     * Fetch the latest 5 reviews (for homepage display).
     */
    public function recent()
    {
        $reviews = \App\Models\Review::with('customer', 'product')
                    ->latest()
                    ->take(5)
                    ->get();

        return view('welcome', compact('reviews'));
    }



    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id'  => 'required|exists:products,id',
            'rating'      => 'required|integer|min:1|max:5',
            'comment'     => 'nullable|string',
        ]);

        $review = Review::create($validated);

        return response()->json($review, 201);
    }

    /**
     * Display the specified review.
     */
    public function show(string $id)
    {
        $review = Review::with(['customer', 'product'])->findOrFail($id);
        return response()->json($review);
    }

    /**
     * Update the specified review.
     */
    public function update(Request $request, string $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'rating'  => 'sometimes|integer|min:1|max:5',
            'comment' => 'sometimes|string',
        ]);

        $review->update($validated);

        return response()->json($review);
    }

    /**
     * Remove the specified review.
     */
    public function destroy(string $id)
    {
        Review::findOrFail($id)->delete();
        return response()->json(null, 204);
    }


    


}