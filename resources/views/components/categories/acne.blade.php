<x-app-layout>
    <div class="min-h-screen flex flex-col bg-[#ffe8e9]">

        {{-- Banner --}}
        <div class="w-full">
            <img 
                src="{{ asset('img/acne-banner.jpeg') }}" 
                alt="Acne Banner" 
                class="w-full h-[498px] object-cover">
        </div>

        {{-- Product Grid (Acne only) --}}
        <section class="max-w-7xl mx-auto px-6 py-12 flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($products as $product)
                    @if($product->category === 'acne')
                        <a href="{{ route('product.details', $product->id) }}" 
                           class="bg-white rounded-2xl shadow hover:shadow-lg transition p-4 cursor-pointer block">
                            <img src="{{ asset('uploads/products/'.$product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-56 object-cover rounded-xl">
                            <div class="mt-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-pink-600 font-bold mt-1">${{ number_format($product->price, 2) }}</p>
                                <p class="text-gray-500 text-sm mt-2 line-clamp-2">{{ $product->description }}</p>
                            </div>
                        </a>
                    @endif
                @empty
                    <p class="text-gray-600 col-span-4 text-center">No acne products found.</p>
                @endforelse
            </div>
        </section>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>
</x-app-layout>
