{{-- resources/views/components/product-details.blade.php --}}
<x-app-layout>
    <div class="min-h-screen bg-[#ffe8e9] py-12">
        <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row gap-12">
            
            {{-- Product Image --}}
            <div class="lg:w-1/2">
                <img src="{{ asset('uploads/products/'.$product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-[500px] object-cover rounded-2xl shadow-lg">
            </div>

            {{-- Product Info --}}
            <div class="lg:w-1/2 flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
                    <p class="text-pink-600 font-bold text-2xl mt-2">${{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-500 mt-4">{{ $product->description }}</p>

                    {{-- Optional Ratings --}}
                    @if($reviews->count() > 0)
                        <div class="mt-4 flex items-center gap-2">
                            <span class="text-yellow-500">
                                ★{{ number_format($reviews->avg('rating'), 1) }}
                            </span>
                            <span class="text-gray-500">({{ $reviews->count() }} reviews)</span>
                        </div>
                    @endif
                </div>

                {{-- Quantity Selector --}}
                <div class="mt-6 flex items-center gap-4">
                    <label for="quantityInput" class="font-semibold">Quantity:</label>
                    <input type="number" name="quantity" id="quantityInput" min="1" value="1"
                        class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-300">
                </div>

                {{-- Action Buttons --}}
                <div class="mt-6 flex gap-4">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantityInputCart">
                        <button type="submit" 
                            class="inline-block text-sm text-[#db9289] border border-[#f3c4c1] bg-white hover:bg-[#db9289] hover:text-white font-semibold py-2 px-4 rounded transition duration-300">
                            Add to Cart
                        </button>
                    </form>

                    <form action="{{ route('checkout.now', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="quantityInputBuyNow">
                        <button type="submit" 
                            class="inline-block text-sm text-[#db9289] border border-[#f3c4c1] bg-white hover:bg-[#db9289] hover:text-white font-semibold py-2 px-4 rounded transition duration-300">
                            Buy Now
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Optional: Reviews Section --}}
        @if($reviews->count() > 0)
            <div class="max-w-7xl mx-auto px-6 mt-12">
                <h2 class="text-2xl font-bold mb-6">Customer Reviews</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($reviews as $review)
                        <div class="bg-white p-4 rounded-lg shadow">
                            <p class="text-gray-700">{{ $review->comment }}</p>
                            <p class="mt-2 text-sm text-gray-500">— {{ $review->user->name ?? 'Anonymous' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

    {{-- Script to sync quantity inputs --}}
    <script>
        const quantityInput = document.getElementById('quantityInput');
        const quantityInputCart = document.getElementById('quantityInputCart');
        const quantityInputBuyNow = document.getElementById('quantityInputBuyNow');

        quantityInput.addEventListener('input', () => {
            quantityInputCart.value = quantityInput.value;
            quantityInputBuyNow.value = quantityInput.value;
        });

        // Initialize hidden inputs
        quantityInputCart.value = quantityInput.value;
        quantityInputBuyNow.value = quantityInput.value;
    </script>
</x-app-layout>
