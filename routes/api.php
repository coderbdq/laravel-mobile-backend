<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    BannerController,
    CategoryController,
    ProductController,
    OrderController,
    AuthController,
    UserController
};

// ✅ Danh sách sản phẩm, banner, danh mục
Route::get('banner-list', [BannerController::class, 'list']);
Route::get('category-list', [CategoryController::class, 'list']);
Route::get('product-list', [ProductController::class, 'list']);
Route::get('products/{id}', [ProductController::class, 'apiShow']);

// ✅ Đơn hàng (mobile API)
Route::post('orders', [OrderController::class, 'apiStore']);
Route::get('order-list/{userid}', [OrderController::class, 'list']);
Route::get('order-detail/{orderid}', [OrderController::class, 'detail']);

// ✅ Auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// ✅ User info (yêu cầu đăng nhập)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user-row', [UserController::class, 'row']);
    Route::get('user', [UserController::class, 'profile']);
    Route::post('user/update', [UserController::class, 'update']);
    Route::post('user/avatar', [UserController::class, 'updateAvatar']);
});
