<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Payment::with(['customer', 'order'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id'      => 'required|exists:orders,id',
            'customer_id'   => 'required|exists:customers,id',
            'amount'        => 'required|numeric',
            'payment_method'=> 'required|string',
            'status'        => 'required|string',
        ]);

        $payment = Payment::create($validated);

        return response()->json($payment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::with(['customer', 'order'])->findOrFail($id);
        return response()->json($payment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                $payment = Payment::findOrFail($id);

        $validated = $request->validate([
            'amount'        => 'sometimes|numeric',
            'payment_method'=> 'sometimes|string',
            'status'        => 'sometimes|string',
        ]);

        $payment->update($validated);

        return response()->json($payment);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
