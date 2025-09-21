<x-app-layout>

    @section('custom-navbar')
        @include('layouts.navbar')
    @endsection

    <div class="min-h-screen flex flex-col bg-[#fffaf9]">

        {{-- Banner --}}
        <div class="relative w-full h-[300px]">
            <img src="{{ asset('img/about-banner.jpeg') }}" 
                 alt="About Us Banner" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white tracking-wide">ABOUT US</h1>
            </div>
        </div>

        {{-- About Intro --}}
        <section class="max-w-5xl mx-auto px-6 py-12 text-center">
            <p class="text-lg text-gray-700 leading-relaxed">
                WELCOME TO <span class="font-bold text-[#db9289]">ELAN</span>, DESTINATION FOR PREMIUM BEAUTY AND SKINCARE PRODUCTS. 
                WE ARE AN ONLINE PLATFORM THAT CURATES DERMATOLOGIST APPROVED AND SKIN TYPE SPECIFIC PRODUCTS TO HELP 
                INDIVIDUALS ACHIEVE HEALTHY, GLOWY SKIN.
            </p>
        </section>

        {{-- What Makes Us Different --}}
        <section class="bg-[#fff0f1] py-12">
            <div class="max-w-5xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">WHAT MAKES US DIFFERENT</h2>
                <ul class="space-y-4 text-lg text-gray-700">
                    <li class="flex items-start">
                        <span class="text-green-600 text-2xl mr-3">✔</span>
                        VERIFIED CUSTOMER REVIEWS TO BUILD TRUST
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-600 text-2xl mr-3">✔</span>
                        CURATED SKINCARE SUBSCRIPTION BOXES FOR CONVENIENCE
                    </li>
                    <li class="flex items-start">
                        <span class="text-green-600 text-2xl mr-3">✔</span>
                        LOYALTY POINTS AND EXCLUSIVE OFFERS FOR OUR MEMBERS
                    </li>
                </ul>
            </div>
        </section>

        <!-- Our Team Section -->
        <section class="w-full py-12 bg-[#fffaf9]">
            <div class="max-w-[1440px] mx-auto px-4">

                <h2 class="text-center text-2xl mb-10 font-bold text-gray-800" style="font-family: 'Lora', serif;">
                    OUR TEAM
                </h2>

                <!-- Scrollable row but centered content -->
                <div class="flex justify-center overflow-x-auto space-x-6 scrollbar-hide">

                    <!-- Team Member 1 -->
                    <div class="flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300 cursor-pointer">
                        <img src="{{ asset('img/team1.jpg') }}" 
                            alt="Sophia Kim" 
                            class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-semibold" style="font-family: 'Lora', serif;">Sophia Kim</h3>
                            <p class="text-gray-600 text-sm">Founder & CEO</p>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300 cursor-pointer">
                        <img src="{{ asset('img/team2.jpg') }}" 
                            alt="Liam Carter" 
                            class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-semibold" style="font-family: 'Lora', serif;">Liam Carter</h3>
                            <p class="text-gray-600 text-sm">Head of Skincare</p>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300 cursor-pointer">
                        <img src="{{ asset('img/team3.jpg') }}" 
                            alt="Amelia Wong" 
                            class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-semibold" style="font-family: 'Lora', serif;">Amelia Wong</h3>
                            <p class="text-gray-600 text-sm">Dermatology Advisor</p>
                        </div>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="flex-shrink-0 w-64 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition duration-300 cursor-pointer">
                        <img src="{{ asset('img/team4.jpg') }}" 
                            alt="Ethan Brown" 
                            class="w-full h-64 object-cover rounded-t-lg">
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-semibold" style="font-family: 'Lora', serif;">Ethan Brown</h3>
                            <p class="text-gray-600 text-sm">Marketing Director</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        {{-- Our Products --}}
        <section class="bg-[#fff0f1] py-12">
            <div class="max-w-5xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">OUR PRODUCTS</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    We partner with <span class="font-semibold">REPUTABLE SKINCARE BRANDS</span> that use 
                    <span class="font-semibold">SAFE, SCIENCE-BACKED, AND CRUELTY-FREE INGREDIENTS</span>. 
                    Our product catalog spans <span class="italic">CLEANSERS, MOISTURIZERS, SERUMS, SUNCREAMS</span> 
                    and more, all categorized to help users <span class="font-semibold">SHOP SMOOTHLY</span>.
                </p>
            </div>
        </section>

        {{-- Footer --}}
        @include('layouts.footer')

    </div>
</x-app-layout>
