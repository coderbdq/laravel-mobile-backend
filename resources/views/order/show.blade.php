@extends('layout')
@section('content')
<section class="p-6 overflow-auto flex-1">
    <div class="bg-white rounded-lg shadow-sm p-4">
        <h2 class="text-lg font-semibold mb-4">Chi tiết đơn hàng</h2>

        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>Họ tên: <strong>{{ $order->name }}</strong></div>
            <div>Email: <strong>{{ $order->email }}</strong></div>
            <div>Điện thoại: <strong>{{ $order->phone }}</strong></div>
            <div>Địa chỉ: <strong>{{ $order->address }}</strong></div>
        </div>

        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 border border-gray-200 text-center font-medium">#</th>
                    <th class="px-4 py-2 border border-gray-200 text-left font-medium">Sản phẩm</th>
                    <th class="px-4 py-2 border border-gray-200 text-left font-medium">Số lượng</th>
                    <th class="px-4 py-2 border border-gray-200 text-left font-medium">Giá</th>
                    <th class="px-4 py-2 border border-gray-200 text-left font-medium">Tổng</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($order->orderdetails as $detail)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-100">{{ $detail->id }}</td>
                        <td class="px-4 py-3 border border-gray-100">
                            {{ $detail->product->name ?? 'Sản phẩm bị xóa' }}
                        </td>
                        <td class="px-4 py-3 border border-gray-100">{{ $detail->quantity }}</td>
                        <td class="px-4 py-3 border border-gray-100">{{ number_format($detail->price) }} ₫</td>
                        <td class="px-4 py-3 border border-gray-100">
                            {{ number_format($detail->price * $detail->quantity) }} ₫
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 text-right font-semibold">
            Tổng cộng: <span class="text-blue-600">{{ number_format($order->total) }} ₫</span>
        </div>
    </div>
</section>
@endsection
