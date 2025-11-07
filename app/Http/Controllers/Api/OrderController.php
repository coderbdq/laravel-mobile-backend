<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * 🧾 POST /api/orders
     * Tạo đơn hàng mới
     */
    public function apiStore(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|integer',
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:30',
            'address' => 'required|string|max:255',
            'items'                => 'required|array|min:1',
            'items.*.id'           => 'required|integer',
            'items.*.quantity'     => 'required|integer|min:1',
            'items.*.price'        => 'required|integer|min:0',
        ]);

        return DB::transaction(function () use ($data) {
            // 🧩 Tạo đơn hàng
            $order = Order::create([
                'user_id' => $data['user_id'] ?? null,
                'name'    => $data['name'],
                'email'   => $data['email'],
                'phone'   => $data['phone'],
                'address' => $data['address'],
                'total'   => collect($data['items'])->sum(fn($i) => $i['price'] * $i['quantity']),
            ]);

            // 🧩 Thêm chi tiết đơn hàng
            foreach ($data['items'] as $item) {
                Orderdetail::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['id'],
                    'quantity'   => $item['quantity'],
                    'price'      => $item['price'],
                ]);
            }

            return response()->json([
                'message'  => 'Order created successfully',
                'order_id' => $order->id,
            ], 201);
        });
    }

    /**
     * 📦 GET /api/order-list/{userid}
     * Lấy danh sách đơn hàng theo người dùng
     */
    public function list($userid)
    {
        // 🧩 Lấy danh sách đơn hàng + tổng tiền
        $orders = DB::table('order as o')
            ->select(
                'o.id',
                'o.user_id',
                'o.name',
                'o.email',
                'o.phone',
                'o.address',
                'o.created_at',
                DB::raw('COALESCE(SUM(od.quantity * od.price),0) as total_price')
            )
            ->leftJoin('orderdetail as od', 'od.order_id', '=', 'o.id')
            ->where('o.user_id', $userid)
            ->groupBy('o.id', 'o.user_id', 'o.name', 'o.email', 'o.phone', 'o.address', 'o.created_at')
            ->orderByDesc('o.id')
            ->get();

        if ($orders->isEmpty()) {
            return response()->json(['data' => []]);
        }

        // 🧩 Lấy chi tiết sản phẩm trong từng đơn
        $items = DB::table('orderdetail as od')
            ->select(
                'od.order_id',
                'od.product_id',
                'od.quantity',
                'od.price',
                'p.name as product_name',
                'p.image_url as product_image'
            )
            ->leftJoin('product as p', 'p.id', '=', 'od.product_id')
            ->whereIn('od.order_id', $orders->pluck('id'))
            ->get()
            ->groupBy('order_id'); // 🔹 Trả về Collection, không còn lỗi array nữa

        // 🧩 Gộp đơn hàng + sản phẩm
        $data = $orders->map(function ($o) use ($items) {
            return [
                'id'          => $o->id,
                'name'        => $o->name,
                'email'       => $o->email,
                'phone'       => $o->phone,
                'address'     => $o->address,
                'total_price' => $o->total_price,
                'created_at'  => $o->created_at,
                'items'       => isset($items[$o->id])
                    ? $items[$o->id]->values() // ✅ `$items[$id]` là Collection
                    : [], // tránh lỗi khi không có items
            ];
        });

        return response()->json(['data' => $data], 200);
    }
}
