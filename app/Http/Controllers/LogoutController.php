<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $response = Http::withToken(session('api_token'))->post(config('app.api_url') . '/api/logout');

        if ($response->ok()) {
            session()->forget('api_token');
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        }

        return redirect()->back()->with('error', 'Failed to log out');
    }
}
