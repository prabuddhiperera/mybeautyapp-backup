<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Order::with(['customer', 'orderItems', 'payment'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'totalamount' => 'required|numeric',
            'orderdate'   => 'required|date',
            'status'      => 'required|string',
        ]);

        $order = Order::create($validated);

        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['customer', 'orderItems', 'payment'])->findOrFail($id);
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'totalamount' => 'sometimes|numeric',
            'orderdate'   => 'sometimes|date',
            'status'      => 'sometimes|string',
        ]);

        $order->update($validated);

        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
