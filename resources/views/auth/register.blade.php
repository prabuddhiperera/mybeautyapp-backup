<x-guest-layout>
  <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="w-full bg-white shadow px-6 py-4 flex justify-between items-center">
            <!-- Left side: Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-4xl font-bold text-black" style="font-family: 'Lora', serif;">Élan</a>
            </div>

            <!-- Right side: Login button -->
            <div>
                <a href="{{ route('login') }}" 
                   class="inline-block text-sm text-[#db9289] border border-[#f3c4c1] bg-white hover:bg-[#db9289] hover:text-white font-semibold py-2 px-4 rounded transition duration-300">
                    LogIn
                </a>
            </div>
        </header>

        <!-- Full-Screen Background Image -->
        <div class="relative w-full h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/login-2.jpg') }}');">
            <!-- Overlay to dim the background -->
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>

            <!-- Register Form -->
            <div class="relative z-10 flex items-center justify-center h-full px-6">
                <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
                    <!-- Form Heading -->
                    <h2 class="text-center text-4xl font-bold mb-2" style="font-family: 'Lora', serif;">Register</h2>
                    <p class="text-center mb-6 text-gray-500">Please enter your details.</p>

                    <!-- Validation Errors -->
                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Register Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
                        </div>

                        <!-- Password -->
                        <div class="mb-4 relative">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required autocomplete="new-password" />
                            <span onclick="togglePassword('password')" class="absolute right-3 top-9 cursor-pointer text-gray-400">👁️</span>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4 relative">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <span onclick="togglePassword('password_confirmation')" class="absolute right-3 top-9 cursor-pointer text-gray-400">👁️</span>
                        </div>

                        <!-- Register Button -->
                        <button type="submit" 
                            class="w-full inline-block text-sm text-white bg-[#db9289] border border-[#db9289] hover:bg-[#b86d77] hover:border-[#b86d77] font-semibold py-2 px-4 rounded transition duration-300">
                            {{ __('Register') }}
                        </button>
                    </form>

                    <!-- Login Link -->
                    <p class="mt-6 text-center text-gray-500">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-[#db9289] font-semibold hover:underline">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            const field = document.getElementById(id);
            field.type = field.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
