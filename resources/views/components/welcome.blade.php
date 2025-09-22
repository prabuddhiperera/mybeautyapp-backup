
    <div class="min-h-screen flex flex-col bg-[#fffaf9]">

        {{-- Dashboard Banner --}}
        <div class="w-full">
            <img 
                src="{{ asset('img/home-banner-2.jpg') }}" 
                alt="Dashboard Banner" 
                class="w-full h-auto object-cover">
        </div>

        {{-- New Arrivals --}}
        <section class="w-full py-12 bg-[#fff5f5] flex-1">
            <div class="max-w-[1440px] mx-auto px-4">
                <h2 class="text-center text-2xl mb-6" style="font-family: 'Lora', serif;">
                    NEW ARRIVALS
                </h2>
                <div class="flex overflow-x-auto space-x-6 scrollbar-hide">
                    @forelse ($products as $product)
                        <div 
                            class="flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition cursor-pointer"
                            onclick="openPreview(
                                '{{ $product->name }}',
                                '{{ $product->price }}',
                                '{{ $product->description }}',
                                '{{ $product->image ? asset('uploads/products/'.$product->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}'
                            )">
                            <img src="{{ $product->image ? asset('uploads/products/'.$product->image) : 'https://via.placeholder.com/300x200?text=No+Image' }}" 
                                alt="{{ $product->name }}" 
                                class="w-full h-48 object-cover rounded-t-lg">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold" style="font-family: 'Lora', serif;">{{ $product->name }}</h3>
                                <p class="text-gray-600 mt-1">$ {{ $product->price }}</p>
                                <button class="mt-3 w-full bg-[#ffbdbd] hover:bg-[#ff9e9e] text-black py-2 rounded-lg transition">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600">No new products found.</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- Product Preview Modal --}}
        <div id="productPreview" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
            <div class="bg-white rounded-lg shadow-lg max-w-md w-full relative">
                <button onclick="closePreview()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-3xl">&times;</button>
                <img id="previewImage" src="" alt="Product Image" class="w-full h-64 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 id="previewName" class="text-xl font-semibold mb-2" style="font-family: 'Lora', serif;"></h3>
                    <p id="previewDescription" class="text-gray-600 mb-2" style="font-family: 'Lora', serif;"></p>
                    <p id="previewPrice" class="text-lg font-bold" style="font-family: 'Lora', serif;"></p>
                </div>
            </div>
        </div>

        {{-- Quote Section --}}
        <section class="w-full bg-[#ffbdbd] flex items-center justify-center px-4 py-8 sm:px-6">
            <div class="text-center max-w-3xl">
                <p class="text-lg sm:text-xl font-semibold text-black leading-relaxed" style="font-family: 'Lora', serif;">
                    "INVEST IN YOUR SKIN, IT IS GOING TO<br />
                    REPRESENT YOU FOR A VERY LONG TIME"
                </p>
                <p class="text-right text-sm text-gray-600 mt-2" style="font-family: 'Lora', serif;">
                    — Linden Tyler
                </p>
            </div>
        </section>

        {{-- Second Banner --}}
        <section class="w-full flex justify-center">
            <img 
                src="{{ asset('img/ANUA_home.png') }}" 
                alt="Dashboard Banner 2" 
                class="w-full max-w-[1440px] h-auto object-cover"/>
        </section>

        {{-- Customer Reviews --}}
        <section class="bg-pink-50 py-12">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <h2 class="text-center text-2xl mb-6" style="font-family: 'Lora', serif;">
                    WHAT OUR CUSTOMER SAY
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($reviews as $review)
                        <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-xl transition">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 rounded-full bg-rose-200 flex items-center justify-center text-white font-bold">
                                    {{ strtoupper(substr($review->user?->name ?? 'U', 0, 1)) }}
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-semibold text-gray-800">{{ $review->user?->name ?? 'Anonymous' }}</h4>
                                    <p class="text-sm text-gray-500">{{ $review->product?->name ?? 'Product' }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4 italic">"{{ $review->comment }}"</p>
                        </div>
                    @empty
                        <p class="text-gray-500 col-span-3 text-center">No reviews yet.</p>
                    @endforelse
                </div>
            </div>
        </section>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>

    {{-- Scripts --}}
    <script>
    function openPreview(name, price, description, image) {
        document.getElementById('previewName').innerText = name;
        document.getElementById('previewPrice').innerText = '$ ' + price;
        document.getElementById('previewDescription').innerText = description;
        document.getElementById('previewImage').src = image;
        document.getElementById('productPreview').classList.remove('hidden');
    }
    function closePreview() {
        document.getElementById('productPreview').classList.add('hidden');
    }
    document.getElementById('productPreview').addEventListener('click', function(e) {
        if (e.target === this) closePreview();
    });
    </script>

