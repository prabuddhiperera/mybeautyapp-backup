<!-- resources/views/components/product_review.blade.php -->

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Products Section -->
    <div class="mb-16">
        <h2 class="text-2xl font-bold mb-6">Our Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">
                    <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Reviews Section -->
    <div>
        <h2 class="text-2xl font-bold mb-6">Customer Reviews</h2>
        <div class="space-y-6">
            @foreach($reviews as $review)
                <div class="bg-gray-100 rounded-xl p-4 shadow-sm">
                    <p class="text-gray-700 italic">"{{ $review->message }}"</p>
                    <p class="mt-2 text-sm font-semibold">- {{ $review->name }}</p>
                </div>
            @endforeach
        </div>
    </div>

</div>
