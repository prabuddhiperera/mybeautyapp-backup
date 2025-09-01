<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(OrderIteam::with(['order', 'product'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'price'      => 'required|numeric',
        ]);

        $orderItem = OrderItem::create($validated);

        return response()->json($orderItem, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $orderItem = OrderItem::with(['order', 'product'])->findOrFail($id);
        return response()->json($orderItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderItem = OrderItem::findOrFail($id);

        $validated = $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'price'    => 'sometimes|numeric',
        ]);

        $orderItem->update($validated);

        return response()->json($orderItem);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OrderItem::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}

