<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'product';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Accessor cho thuộc tính 'image_url'.
     *
     * Hàm này sẽ tự động được gọi mỗi khi bạn truy cập $product->image_url.
     * Nó sẽ lấy giá trị gốc từ database (ví dụ: '1.png') và thêm tiền tố
     * 'images/products/' vào trước khi trả về.
     *
     * @param  string  $value  Giá trị gốc từ cột 'image_url' trong database.
     * @return string|null
     */
    public function getImageUrlAttribute($value): ?string
    {
        // Chỉ thêm tiền tố nếu giá trị gốc tồn tại
        if ($value) {
            // Trả về chuỗi hoàn chỉnh 'images/products/1.png'
            return 'images/products/' . $value;
        }

        return null; // Trả về null nếu không có ảnh
    }
}