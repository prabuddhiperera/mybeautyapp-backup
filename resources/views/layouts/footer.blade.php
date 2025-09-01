<footer class="bg-[#ffbdbd] text-gray-300 py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <!-- Logo / About -->
        <div>
            <h2 class="text-black text-3xl font-bold mb-4" style="font-family: 'Lora', serif;">Élan</h2>
            <p class="text-sm text-black">
                Your trusted place for skincare and beauty essentials✨
            </p>
        </div>

        <!-- Links -->
        <div>
            <h3 class="text-black text-lg font-semibold mb-4">Nav Links</h3>
            <ul class="space-y-2 text-sm text-black">
                <li><a href="/dashboard" class="hover:text-rose-400">HOME</a></li>
                <li><a href="/shop" class="hover:text-rose-400">SHOP</a></li>
                <li><a href="/category" class="hover:text-rose-400">CATEGORIES</a></li>
                <li><a href="/about" class="hover:text-rose-400">ABOUT US</a></li>
                <li><a href="/contact" class="hover:text-rose-400">CONTACT US</a></li>
            </ul>
        </div>

        <!-- Customer Service -->
        <div>
            <h3 class="text-black text-lg font-semibold mb-4">Customer Service</h3>
            <ul class="space-y-2 text-sm text-black">
                <li><a href="/faq" class="hover:text-rose-400">FAQ</a></li>
                <li><a href="/orders" class="hover:text-rose-400">Orders</a></li>
                <li><a href="/privacy" class="hover:text-rose-400">Privacy Policy</a></li>
                <li><a href="/terms" class="hover:text-rose-400">Terms & Conditions</a></li>
            </ul>
        </div>

        <!-- Social -->
        <div>
            <h3 class="text-black text-lg font-semibold mb-4">Follow Us</h3>
            <div class="flex space-x-4 text-black">
                <a href="#" class="hover:text-rose-400"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-rose-400"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-rose-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-rose-400"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!-- Bottom -->
    <div class="border-t border-gray-700 mt-10 pt-6 text-center text-sm text-black">
        © {{ date('Y') }} Beauty & Skincare. All rights reserved.
    </div>
</footer>

<!-- Dropdown Toggle Script -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("categoriesBtn");
    const menu = document.getElementById("categoriesMenu");

    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      menu.classList.toggle("hidden");
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", (e) => {
      if (!btn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add("hidden");
      }
    });
  });
</script>
