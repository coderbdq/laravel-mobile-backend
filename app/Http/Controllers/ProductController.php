<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->orderBy('created_at', 'desc')
            ->with('category')
            ->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categorys = Category::query()->get();
        return view('product.create', compact('categorys'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->content = $request->content;
        $product->price = $request->price;
        $product->price_discount = $request->price_discount;
        $product->category_id = $request->category_id;

        // [SỬA] Logic upload file
        $file = $request->file('image_url');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        // Vẫn lưu file vào thư mục 'images/products'
        $file->storeAs('images/products', $filename, 'public');
        // Nhưng chỉ lưu TÊN FILE vào database để đồng bộ với dữ liệu cũ
        $product->image_url = $filename;

        if ($product->save()) {
            return redirect()->route('product.index')->with('success', 'Thêm thành công');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categorys = Category::query()->get();
        if ($product == null) {
            return redirect()->route('user.index')->with('error', 'Không tìm thấy thông tin!');
        }
        return view('product.edit', compact('product', 'categorys'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('user.index')->with('error', 'Không tìm thấy thông tin!');
        }
        $product->name = $request->name;
        $product->content = $request->content;
        $product->price = $request->price;
        $product->price_discount = $request->price_discount;
        $product->category_id = $request->category_id;

        // [SỬA] Logic upload file và xóa file cũ
        if ($request->hasFile('image_url')) {
            // [LỖI ĐÃ SỬA] Lấy đường dẫn đúng từ accessor để xóa file cũ
            if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
                Storage::disk('public')->delete($product->image_url);
            }
            // Upload file mới
            $file = $request->file('image_url');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images/products', $filename, 'public');
            // Chỉ lưu TÊN FILE vào database
            $product->image_url = $filename;
        }

        if ($product->save()) {
            return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('user.index')->with('error', 'Không tìm thấy thông tin!');
        }
        // Lấy đường dẫn ảnh ĐÚNG trước khi xóa record
        $product_image_path = $product->image_url;

        if ($product->delete()) {
            // [LỖI ĐÃ SỬA] Xóa file ảnh cũ sau khi đã xóa record thành công
            if ($product_image_path && Storage::disk('public')->exists($product_image_path)) {
                Storage::disk('public')->delete($product_image_path);
            }
            return redirect()->route('product.index')->with('success', 'Xóa thành công');
        }
    }
}