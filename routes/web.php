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

    // Hyperpigmentation category page
    Route::get('/user/shop/categories/hyperpigmentation', function () {
        // Fetch the category first
        $category = \App\Models\Category::where('name', 'hyperpigmentation')->firstOrFail();

        // Get all products in this category
        $products = \App\Models\Product::where('category_id', $category->id)->get();

        // Pass $products to the Blade view
        return view('components.categories.hyperpigmentation', compact('products', 'category'));
    })->name('user.shop.hyperpigmentation');


    // Brightening category page
    Route::get('/user/shop/categories/brightening', function () {
        // Fetch the category first
        $category = \App\Models\Category::where('name', 'brightening')->firstOrFail();

        // Get all products in this category
        $products = \App\Models\Product::where('category_id', $category->id)->get();

        // Pass $products to the Blade view
        return view('components.categories.brightening', compact('products', 'category'));
    })->name('user.shop.brightening');

    // cleanser category page
    Route::get('/user/shop/categories/cleanser', function () {
        // Fetch the category first
        $category = \App\Models\Category::where('name', 'cleanser')->firstOrFail();

        // Get all products in this category
        $products = \App\Models\Product::where('category_id', $category->id)->get();

        // Pass $products to the Blade view
        return view('components.categories.cleanser', compact('products', 'category'));
    })->name('user.shop.cleanser');

    // Cleanser & Makeup Remover category page
    Route::get('/user/shop/categories/cleanser', function () {
        // Fetch the category first
        $category = \App\Models\Category::where('name', 'Cleanser & Makeup Remover')->firstOrFail();

        // Get all products in this category
        $products = \App\Models\Product::where('category_id', $category->id)->get();

        // Pass $products to the Blade view
        return view('components.categories.cleanser', compact('products', 'category'));
    })->name('user.shop.cleanser');


    // moisturizer category page
    Route::get('/user/shop/categories/moisturizer', function () {
        // Fetch the category first
        $category = \App\Models\Category::where('name', 'moisturizer')->firstOrFail();

        // Get all products in this category
        $products = \App\Models\Product::where('category_id', $category->id)->get();

        // Pass $products to the Blade view
        return view('components.categories.moisturizer', compact('products', 'category'));
    })->name('user.shop.moisturizer');
    

    // moisturizer category page
    Route::get('/user/shop/categories/makeup', function () {
        // Fetch the category first
        $category = \App\Models\Category::where('name', 'makeup')->firstOrFail();

        // Get all products in this category
        $products = \App\Models\Product::where('category_id', $category->id)->get();

        // Pass $products to the Blade view
        return view('components.categories.makeup', compact('products', 'category'));
    })->name('user.shop.makeup');

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