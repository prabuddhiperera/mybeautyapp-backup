<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed', // requires password_confirmation
        ]);

        // Create user
        $user = User::create([
            'name' => $request->username, // store username in 'name' field
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return response
        return response()->json([
            'message' => 'User registered successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 201);
    }

    // Login user
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        // Check password
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return response
        return response()->json([
            'message' => 'User logged in successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 200);
    }

    // Logout user
    public function logout(Request $request)
    {
        // Revoke current access token
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'User logged out successfully'
        ]);
    }
}