<!-- Navbar -->
<nav class="w-full bg-[#ffbdbd] shadow-md">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    
    <!-- Left: Logo -->
    <div class="flex-shrink-0">
      <a href="/" class="text-4xl font-bold text-black " style="font-family: 'Lora', serif;">Élan</a>
    </div>

    <!-- Center: Navigation Links -->
    <ul class="hidden md:flex space-x-14 text-black text-l mx-auto" style="font-family: 'Lora', serif;">
      <li><a href="/" class="px-3 py-2 rounded-md hover:bg-white hover:text-[#db9289] transition">HOME</a></li>
      <li><a href="/shop" class="px-3 py-2 rounded-md hover:bg-white hover:text-[#db9289] transition">SHOP</a></li>
      
      <!-- Categories Dropdown -->
      <li class="relative">
        <button id="categoriesBtn" class="flex items-center space-x-1 hover:text-[#db9289] focus:outline-none">
          <span>CATEGORIES</span>
          <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 9l-7 7-7-7" />
          </svg>
        </button>
        <!-- Dropdown -->
        <ul id="categoriesMenu" class="absolute hidden bg-white shadow-lg rounded-md mt-2 py-2 w-56">
          <li><a href="{{ url('/categories/acne') }}" class="block px-4 py-2 hover:bg-[#ffbdbd]">Acne</a></li>
          <li><a href="{{ url('/categories/hyperpigmentation') }}" class="block px-4 py-2 hover:bg-[#ffbdbd]">Hyperpigmentation</a></li>
          <li><a href="{{ url('/categories/brightening') }}" class="block px-4 py-2 hover:bg-[#ffbdbd]">Brightening</a></li>
          <li><a href="{{ url('/categories/cleanser') }}" class="block px-4 py-2 hover:bg-[#ffbdbd]">Cleanser & Makeup Remover</a></li>
          <li><a href="{{ url('/categories/moisturizer') }}" class="block px-4 py-2 hover:bg-[#ffbdbd]">Moisturizer</a></li>
          <li><a href="{{ url('/categories/makeup') }}" class="block px-4 py-2 hover:bg-[#ffbdbd]">Makeup</a></li>
        </ul>
      </li>

      <li><a href="/about" class="px-3 py-2 rounded-md hover:bg-white hover:text-[#db9289] transition">ABOUT US</a></li>
      <li><a href="/contact" class="px-3 py-2 rounded-md hover:bg-white hover:text-[#db9289] transition">CONTACT US</a></li>
    </ul>

    <!-- Right: Icons
    <div class="flex items-center space-x-6 text-black">
    <div class="flex items-center space-x-6 text-black">
    <a href="/search" class="hover:text-[#db9289]">
        <span class="material-icons">search</span>
    </a>
    <a href="/favourite" class="hover:text-[#db9289]">
        <span class="material-icons">favorite</span>
    </a>
    <a href="/cart" class="hover:text-[#db9289]">
        <span class="material-icons">shopping_cart</span>
    </a>
    <a href="/profile" class="hover:text-[#db9289]">
        <span class="material-icons">person</span>
    </a>
</div> -->


    <div class="flex items-center space-x-5">
        <!-- Login Button -->
            <a href="{{ route('login') }}" class="inline-block text-sm text-[#db9289] border border-[#f3c4c1] bg-white hover:bg-[#db9289] hover:text-white font-semibold py-2 px-4 rounded transition duration-300">
                Login
            </a>

        <!-- Register Button -->
            <a href="{{ route('register') }}" class="inline-block text-sm text-[#db9289] border border-[#f3c4c1] bg-white hover:bg-[#db9289] hover:text-white font-semibold py-2 px-4 rounded transition duration-300">
                Register
            </a>
    </div>


  </div>
</nav>

<!-- Dropdown Toggle Script -->
<script>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("categoriesBtn");
    const menu = document.getElementById("categoriesMenu");

    btn.addEventListener("click", (e) => {
        e.stopPropagation(); // prevents immediate closing
        menu.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add("hidden");
        }
    });
});
</script>

