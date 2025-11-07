<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    public function list(Request $request)
    {
        $limit = $request->input('limit', 10);
        $banners = Banner::query()
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        // Chuẩn hóa output
        return response()->json(['data' => $banners]);
    }
}
