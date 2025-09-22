<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class AdminLogin extends Component
{
    public $name, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Make HTTP request to backend API (adjust endpoint if needed)
        $response = Http::post('/api/admin/login', [
            'name' => $this->name,
            'password' => $this->password,
            'user_type' => 'admin',
        ]);

        if ($response->successful()) {
            // Handle successful login
            session(['admin_token' => $response->json()['token']]);
            session()->flash('message', 'Admin login successful');

            return redirect()->route('admin.dashboard');
        } else {
            // Handle failed login
            session()->flash('error', 'Invalid admin credentials');
        }
    }

    public function render()
    {
        return view('livewire.admin-login');
    }
}
