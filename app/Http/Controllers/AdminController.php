<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::first();
        return new AdminResource($admin);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6'
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return new AdminResource($admin);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);
        return new AdminResource($admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:admins,email,' . $admin->id,
            'password' => 'sometimes|min:6'
        ]);

        $admin->update([
            'name' => $request->name ?? $admin->name,
            'email' => $request->email ?? $admin->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password
        ]);

        return new AdminResource($admin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->json(['message' => 'Admin deleted successfully']);
    }
}
