<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order'; // ✅ trùng với DB thật
    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address',
    ];

    // Quan hệ người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Quan hệ chi tiết đơn
    public function orderdetails()
    {
        return $this->hasMany(Orderdetail::class, 'order_id', 'id');
    }
}
