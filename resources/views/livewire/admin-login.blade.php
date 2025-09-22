<div class="max-w-md mx-auto bg-white p-8 border border-gray-200 rounded-lg shadow-md">

    @if (session()->has('error'))
        <div class="text-red-500 text-center mb-4">{{ session('error') }}</div>
    @endif

    @if (session()->has('message'))
        <div class="text-green-500 text-center mb-4">{{ session('message') }}</div>
    @endif

    <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>

    <form wire:submit.prevent="login">

        {{-- Username --}}
        <div class="mb-4">
            <label for="username" class="block text-sm font-semibold text-gray-700">Username</label>
            <input type="text" id="username" wire:model="username"
                   class="w-full p-2 border border-gray-300 rounded" required>
            @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
            <input type="password" id="password" wire:model="password"
                   class="w-full p-2 border border-gray-300 rounded" required>
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700">
                Login
            </button>
        </div>

    </form>
</div>
