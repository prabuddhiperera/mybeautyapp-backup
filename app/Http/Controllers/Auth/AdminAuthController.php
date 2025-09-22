<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.login'); // Make sure this view exists
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard'); // redirect after login
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/dashboard');
    }
}
