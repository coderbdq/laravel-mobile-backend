<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@shopbike.vn', 'phone' => '0909123456', 'avatar' => 'user.png', 'password' => Hash::make('123456'), 'address' => 'TP. Hồ Chí Minh'],
            ['name' => 'Nguyễn Văn A', 'email' => 'a.nguyen@gmail.com', 'phone' => '0987123456', 'avatar' => 'avatars/avatar_1.jpg', 'password' => Hash::make('123456'), 'address' => 'Hà Nội'],
            ['name' => 'Trần Thị B', 'email' => 'b.tran@gmail.com', 'phone' => '0978123456', 'avatar' => 'avatars/avatar_2.jpg', 'password' => Hash::make('123456'), 'address' => 'Đà Nẵng'],
            ['name' => 'Phạm Đức C', 'email' => 'c.pham@gmail.com', 'phone' => '0912345678', 'avatar' => 'avatars/avatar_3.jpg', 'password' => Hash::make('123456'), 'address' => 'Cần Thơ'],
            ['name' => 'Lê Thu D', 'email' => 'd.le@gmail.com', 'phone' => '0934567890', 'avatar' => 'avatars/avatar_4.jpg', 'password' => Hash::make('123456'), 'address' => 'Huế'],
            ['name' => 'Bạch Đông Quân', 'email' => 'quanbachdong@gmail.com', 'phone' => '0947890112', 'avatar' => 'avatars/avatar_5.jpg', 'password' => Hash::make('123456'), 'address' => 'TP. Hồ Chí Minh'],
            ['name' => 'Nguyễn Minh Khang', 'email' => 'khang.nguyen@gmail.com', 'phone' => '0903214567', 'avatar' => 'avatars/avatar_6.jpg', 'password' => Hash::make('123456'), 'address' => 'Biên Hòa'],
            ['name' => 'Đỗ Hoàng Nam', 'email' => 'nam.do@gmail.com', 'phone' => '0978456231', 'avatar' => 'avatars/avatar_7.jpg', 'password' => Hash::make('123456'), 'address' => 'Hải Phòng'],
            ['name' => 'Lâm Thị Hồng', 'email' => 'hong.lam@gmail.com', 'phone' => '0987111222', 'avatar' => 'avatars/avatar_8.jpg', 'password' => Hash::make('123456'), 'address' => 'Bình Dương'],
            ['name' => 'Tô Đức Vinh', 'email' => 'vinh.to@gmail.com', 'phone' => '0938422423', 'avatar' => 'avatars/avatar_9.jpg', 'password' => Hash::make('123456'), 'address' => 'Quảng Nam'],
            ['name' => 'Nguyễn Anh Tú', 'email' => 'tuanh.nguyen@gmail.com', 'phone' => '0978991212', 'avatar' => 'avatars/avatar_10.jpg', 'password' => Hash::make('123456'), 'address' => 'Gia Lai'],
            ['name' => 'Phan Thị Hoa', 'email' => 'hoa.phan@gmail.com', 'phone' => '0909988776', 'avatar' => 'avatars/avatar_11.jpg', 'password' => Hash::make('123456'), 'address' => 'Long An'],
            ['name' => 'Trần Minh Tân', 'email' => 'tan.tran@gmail.com', 'phone' => '0944332211', 'avatar' => 'avatars/avatar_12.jpg', 'password' => Hash::make('123456'), 'address' => 'Đắk Lắk'],
            ['name' => 'Nguyễn Hữu Lộc', 'email' => 'loc.nguyen@gmail.com', 'phone' => '0933666777', 'avatar' => 'avatars/avatar_13.jpg', 'password' => Hash::make('123456'), 'address' => 'Vũng Tàu'],
            ['name' => 'Võ Ngọc Mai', 'email' => 'mai.vo@gmail.com', 'phone' => '0977445123', 'avatar' => 'avatars/avatar_14.jpg', 'password' => Hash::make('123456'), 'address' => 'Hà Nội'],
            ['name' => 'Phan Huy Quang', 'email' => 'quang.phan@gmail.com', 'phone' => '0938776334', 'avatar' => 'avatars/avatar_15.jpg', 'password' => Hash::make('123456'), 'address' => 'Huế'],
            ['name' => 'Nguyễn Duy Kiên', 'email' => 'kien.nguyen@gmail.com', 'phone' => '0912444333', 'avatar' => 'avatars/avatar_16.jpg', 'password' => Hash::make('123456'), 'address' => 'Bắc Ninh'],
            ['name' => 'Lê Thảo Nhi', 'email' => 'nhi.le@gmail.com', 'phone' => '0909321654', 'avatar' => 'avatars/avatar_17.jpg', 'password' => Hash::make('123456'), 'address' => 'TP. HCM'],
            ['name' => 'Trương Minh Đạt', 'email' => 'dat.truong@gmail.com', 'phone' => '0904556677', 'avatar' => 'avatars/avatar_18.jpg', 'password' => Hash::make('123456'), 'address' => 'Cà Mau'],
            ['name' => 'Nguyễn Thị Thuỷ', 'email' => 'thuy.nguyen@gmail.com', 'phone' => '0978111000', 'avatar' => 'avatars/avatar_19.jpg', 'password' => Hash::make('123456'), 'address' => 'Đồng Nai'],
        ]);
    }
}
