<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // app/Http/Controllers/Api/ProductController.php
    public function list(Request $request)
    {
        $limit    = $request->input('limit', 10);
        $products = Product::query()
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        // Nếu cột của bạn là `image_url`, cứ trả nguyên; nếu là `image` trong storage/public thì map thêm URL:
        // $products->transform(fn($p) => $p->image_url = $p->image ? url(Storage::url($p->image)) : null);

        return response()->json(['data' => $products]);
    }
    public function apiShow($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }
        return response()->json($product);
    }
}
