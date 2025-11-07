<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    // 🧭 Danh sách user
    public function index()
    {
        $users = User::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('user.index', compact('users'));
    }

    // 🧩 Form tạo user
    public function create()
    {
        return view('user.create');
    }

    // 🟢 Thêm user mới
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // ✅ mã hóa mật khẩu
        $user->address = $request->address;

        // ✅ Upload avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/users', $filename, 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Thêm thành công');
    }

    // ✏️ Form sửa user
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Không tìm thấy thông tin!');
        }
        return view('user.edit', compact('user'));
    }

    // 🟡 Cập nhật user
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Không tìm thấy thông tin!');
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        // ✅ chỉ mã hóa khi password mới được nhập
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->address = $request->address;

        // ✅ Upload avatar
        if ($request->hasFile('avatar')) {
            // Xóa avatar cũ
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $file = $request->file('avatar');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/users', $filename, 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Cập nhật thành công');
    }

    // 🔴 Xóa user
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Không tìm thấy thông tin!');
        }

        $user_image = $user->avatar;

        if ($user->delete()) {
            if ($user_image && Storage::disk('public')->exists($user_image)) {
                Storage::disk('public')->delete($user_image);
            }
            return redirect()->route('user.index')->with('success', 'Xóa thành công!');
        }
    }
}
