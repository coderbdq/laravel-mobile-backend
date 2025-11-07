<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 📋 Danh sách đơn hàng
    public function index()
    {
        // Lấy tất cả đơn hàng (phân trang 10 dòng / trang)
        $orders = Order::orderByDesc('id')->paginate(10);

        return view('order.index', compact('orders'));
    }

    // 👁️ Xem chi tiết đơn hàng
    public function show($id)
    {
        // Lấy đơn hàng + quan hệ orderdetails và user (nếu có)
        $order = Order::with(['orderdetails.product', 'user'])->findOrFail($id);

        return view('order.show', compact('order'));
    }

    // 🗑️ Xóa đơn hàng (và chi tiết của nó)
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Xóa chi tiết đơn hàng
        $order->orderdetails()->delete();
        // Xóa đơn hàng
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Đã xoá đơn hàng thành công!');
    }
}
