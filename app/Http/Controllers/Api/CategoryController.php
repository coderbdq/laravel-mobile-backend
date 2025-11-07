<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // app/Http/Controllers/Api/CategoryController.php
    public function list(Request $request)
    {
        $limit = $request->input('limit', 10);
        $items = Category::query()->orderBy('created_at', 'desc')->limit($limit)->get();
        return response()->json(['data' => $items]);
    }

}
