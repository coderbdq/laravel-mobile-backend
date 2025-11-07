<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // 🔹 Lấy thông tin user
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    // 🔹 Cập nhật thông tin cơ bản
    public function update(Request $request)
    {
        $user = $request->user();
        $user->update($request->only('name', 'phone'));
        return response()->json([
            'message' => 'Cập nhật thành công',
            'user' => $user
        ]);
    }

    // 🔹 Upload & cập nhật avatar
    public function updateAvatar(Request $request)
    {
        $user = $request->user();

        if (!$request->hasFile('avatar')) {
            return response()->json(['message' => 'Không có file nào được tải lên.'], 400);
        }

        $file = $request->file('avatar');

        // ✅ Kiểm tra định dạng file hợp lệ
        $ext = strtolower($file->getClientOriginalExtension());
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            return response()->json(['message' => 'Chỉ chấp nhận ảnh JPG, PNG hoặc WEBP.'], 415);
        }

        // ✅ Xóa ảnh cũ nếu có
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        // ✅ Lưu ảnh mới vào storage/app/public/avatars
        $filename = uniqid('avatar_') . '.' . $ext;
        $path = $file->storeAs('avatars', $filename, 'public');

        $user->avatar = $path;
        $user->save();

        return response()->json([
            'message' => 'Cập nhật avatar thành công',
            'avatar' => $path,
            'url' => secure_asset('storage/' . $path),
        ]);
    }

    // 🔹 Trả về dữ liệu user (dùng cho ProfileScreen)
    public function row(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // ✅ Đảm bảo trả đúng thư mục avatars/
        $avatarPath = $user->avatar
            ? $user->avatar
            : 'avatars/user.png';

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'avatar' => $avatarPath,
            'avatar_url' => secure_asset('storage/' . $avatarPath),
        ]);
    }
}
