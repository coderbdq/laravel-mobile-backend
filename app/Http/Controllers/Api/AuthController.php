<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // 🟢 API Đăng ký
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // ✅ Tạo user mới
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone ?? '',
                'avatar' => 'user.png', // Ảnh mặc định
                'address' => $request->address ?? '',
            ]);

            // ✅ Tạo token Sanctum
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Đăng ký thành công',
                'token' => $token,
                'user' => $user,
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Lỗi server: ' . $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }

    // 🟡 API Đăng nhập
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $user = User::where('email', $request->email)->first();

            // ❌ Nếu email không tồn tại hoặc sai mật khẩu
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Thông tin đăng nhập không đúng.'], 401);
            }

            // ✅ Tạo token mới
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Đăng nhập thành công',
                'token' => $token,
                'user' => $user,
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Lỗi server: ' . $e->getMessage(),
                'line' => $e->getLine(),
            ], 500);
        }
    }
}
