<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes requiring authentication
Route::middleware('auth:sanctum')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Get authenticated user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Products (CRUD)
    Route::apiResource('products', ProductController::class);

    // Categories (CRUD)
    Route::apiResource('categories', CategoryController::class);

    // Orders (customers create, admins manage)
    Route::apiResource('orders', OrderController::class);

    // Order Items
    Route::apiResource('order-items', OrderItemController::class);

    // Reviews
    Route::apiResource('reviews', ReviewController::class);

    // Payments (admin only for update, destroy)
    Route::apiResource('payments', PaymentController::class);
});

