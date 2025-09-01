<x-guest-layout>
  <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="w-full bg-white shadow px-6 py-4 flex justify-between items-center">
            <!-- Left side: Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-4xl font-bold text-black" style="font-family: 'Lora', serif;">Élan</a>
            </div>

            <!-- Right side: Register button -->
            <div>
                <a href="{{ route('register') }}" 
                   class="inline-block text-sm text-[#db9289] border border-[#f3c4c1] bg-white hover:bg-[#db9289] hover:text-white font-semibold py-2 px-4 rounded transition duration-300">
                    Create Account
                </a>
            </div>
        </header>

        <!-- Full-Screen Background Image -->
        <div class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/login-2.jpg') }}');">
            <!-- Overlay to dim the background -->
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>

            <!-- Login Form -->
            <div class="relative z-10 flex items-center justify-center h-full px-6">
                <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
                    <!-- Form Heading -->
                    <h2 class=" text-center text-4xl font-bold mb-2" style="font-family: 'Lora', serif;">Login</h2>
                    <p class="text-center mb-6 text-gray-500">Welcome back! Please enter your details.</p>

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4 relative">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required autocomplete="current-password" />
                            <!-- Eye icon to toggle visibility -->
                            <span onclick="togglePassword()" class="absolute right-3 top-9 cursor-pointer text-gray-400">👁️</span>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between mb-6">
                            <label class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-[#db9289] hover:underline" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Login Button -->
                        <button type="submit" 
                            class="w-full inline-block text-l text-white bg-[#db9289] border border-[#db9289] hover:bg-[#b86d77] hover:border-[#b86d77] font-semibold py-2 px-4 rounded transition duration-300">
                            {{ __('Log in') }}
                        </button>
                    </form>

                    <!-- Register Link -->
                    <p class="mt-6 text-center text-gray-500">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="text-[#db9289] font-semibold hover:underline">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
