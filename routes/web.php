<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Review;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;

// Welcome Page
Route::get('/', function () {
    $products = Product::inRandomOrder()->take(10)->get();
    $reviews = Review::with('user')->inRandomOrder()->take(6)->get();
    return view('welcome', compact('products', 'reviews'));
});

// dashboard Page
Route::get('/dashboard', function () {
    $products = Product::inRandomOrder()->take(10)->get();
    $reviews = Review::with('user')->inRandomOrder()->take(6)->get();

    return view('dashboard', compact('products', 'reviews'));
})->name('dashboard');


// Dashboard (Jetstream protected)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // Make sure to fetch products & reviews
        $products = Product::inRandomOrder()->take(10)->get();
        $reviews = Review::with('user')->inRandomOrder()->take(6)->get();

        return view('dashboard', compact('products', 'reviews'));
    })->name('dashboard');
});

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

Route::get('/component-shop', function () {
    return view('components.shop', [
        'products' => \App\Models\Product::all(),
    ]);
})->name('component.shop');


// Post-login routes (authenticated users only)
Route::middleware(['auth'])->group(function () {
    // Logged-in shop
    Route::get('/user/shop', [ProductController::class, 'userShop'])->name('user.shop');

    // Product details page
    Route::get('/product/{id}', [ProductController::class, 'productDetails'])->name('product.details');

    // Acne category page (blade only)
    Route::get('/user/shop/categories/acne', function () {
        return view('components.categories.acne');
    })->name('user.shop.acne');

    // Optional: Add-to-cart or buy now routes can go here
    // Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/shop/categories/acne', function () {
        $products = Product::where('category', 'acne')->get();
        return view('components.categories.acne', compact('products'));
    })->name('user.shop.acne');

    // Product details page
    Route::get('/product/{id}', [CategoryController::class, 'productDetails'])
        ->name('product.details');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/checkout/now/{id}', [CartController::class, 'buyNow'])->name('checkout.now');
});

Route::get('/categories/acne', [CategoryController::class, 'acne'])->name('categories.acne');
Route::get('/categories/hyperpigmentation', [CategoryController::class, 'hyperpigmentation'])->name('categories.hyperpigmentation');
Route::get('/categories/brightening', [CategoryController::class, 'brightening'])->name('categories.brightening');
Route::get('/categories/cleanser', [CategoryController::class, 'cleanser'])->name('categories.cleanser');
Route::get('/categories/moisturizer', [CategoryController::class, 'moisturizer'])->name('categories.moisturizer');
Route::get('/categories/makeup', [CategoryController::class, 'makeup'])->name('categories.makeup');


// Static pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/favourites', function () {
    return view('favourites');
})->name('favourite');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');