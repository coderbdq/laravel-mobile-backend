<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product')->insert([
            ['name' => 'Xe đạp thể thao Giant Escape 3', 'category_id' => 1, 'image_url' => 'bike_escape3.jpg', 'content' => 'Khung nhôm nhẹ, phanh đĩa cơ, bánh 700C.', 'price' => 8500000, 'price_discount' => 7990000],
            ['name' => 'Xe đạp MTB Trek Marlin 7', 'category_id' => 2, 'image_url' => 'bike_marlin7.jpg', 'content' => 'Xe MTB bánh 29 inch, 18 tốc độ Shimano Altus.', 'price' => 15900000, 'price_discount' => 14500000],
            ['name' => 'Xe đạp trẻ em Fornix Kid 20', 'category_id' => 3, 'image_url' => 'bike_kid20.jpg', 'content' => 'Xe trẻ em 6–9 tuổi, khung thép sơn tĩnh điện.', 'price' => 2900000, 'price_discount' => 2590000],
            ['name' => 'Mũ bảo hiểm thể thao Giro Isode', 'category_id' => 4, 'image_url' => 'helmet_giro.jpg', 'content' => 'Mũ bảo hiểm nhẹ, thoáng khí, chuẩn an toàn CE.', 'price' => 1200000, 'price_discount' => 999000],
            ['name' => 'Bộ dụng cụ sửa xe đa năng 16 món', 'category_id' => 5, 'image_url' => 'toolkit_16.jpg', 'content' => 'Gồm tuốc nơ vít, cờ lê, bơm mini.', 'price' => 450000, 'price_discount' => 399000],
            ['name' => 'Xe đạp gấp Folding Bike G7', 'category_id' => 6, 'image_url' => 'folding_g7.jpg', 'content' => 'Gập gọn dễ dàng, tiện di chuyển, khung hợp kim nhôm.', 'price' => 9500000, 'price_discount' => 8900000],
            ['name' => 'Xe đạp điện VinFast Evo200', 'category_id' => 8, 'image_url' => 'electric_evo200.jpg', 'content' => 'Pin lithium 400W, phạm vi 70km.', 'price' => 19900000, 'price_discount' => 18900000],
            ['name' => 'Xe đạp đường trường Road Giant Contend 3', 'category_id' => 7, 'image_url' => 'road_contend3.jpg', 'content' => 'Xe road khung nhôm, groupset Shimano Claris.', 'price' => 21000000, 'price_discount' => 18900000],
            ['name' => 'Găng tay xe đạp Rockbros Gel', 'category_id' => 4, 'image_url' => 'gloves_rockbros.jpg', 'content' => 'Găng tay thoáng khí, lớp đệm gel chống trượt.', 'price' => 320000, 'price_discount' => 290000],
            ['name' => 'Giỏ xe đạp nữ Inox Size M', 'category_id' => 9, 'image_url' => 'basket_inox.jpg', 'content' => 'Giỏ xe bằng inox sáng bóng, dễ lắp ráp.', 'price' => 180000, 'price_discount' => 159000],
            ['name' => 'Đèn pha xe đạp LED 4000Lm', 'category_id' => 9, 'image_url' => 'light_led4000.jpg', 'content' => 'Đèn sạc USB, sáng mạnh, 3 chế độ chiếu.', 'price' => 350000, 'price_discount' => 299000],
            ['name' => 'Xe đạp leo núi Fornix FX26', 'category_id' => 2, 'image_url' => 'bike_fx26.jpg', 'content' => 'Xe đạp MTB, phanh đĩa cơ, bánh 26 inch.', 'price' => 6900000, 'price_discount' => 6590000],
            ['name' => 'Xe đạp nữ Nhật Asama CL20', 'category_id' => 1, 'image_url' => 'bike_asama_cl20.jpg', 'content' => 'Khung thấp, yên êm, giỏ trước tiện dụng.', 'price' => 4300000, 'price_discount' => 3990000],
            ['name' => 'Phụ tùng thay xích Shimano HG40', 'category_id' => 10, 'image_url' => 'chain_hg40.jpg', 'content' => 'Xích 6/7/8 tốc độ, bền và trơn tru.', 'price' => 320000, 'price_discount' => 290000],
            ['name' => 'Bình nước thể thao Rockbros 600ml', 'category_id' => 10, 'image_url' => 'bottle_rockbros.jpg', 'content' => 'Nhựa BPA-free, thiết kế thể thao.', 'price' => 150000, 'price_discount' => 129000],
            ['name' => 'Yên xe đạp da chống thấm', 'category_id' => 9, 'image_url' => 'seat_leather.jpg', 'content' => 'Chất liệu da mềm, chống trượt.', 'price' => 490000, 'price_discount' => 459000],
            ['name' => 'Xe đạp thể thao MTB Galaxy M20', 'category_id' => 2, 'image_url' => 'bike_galaxy_m20.jpg', 'content' => 'Xe leo núi Galaxy, phanh đĩa dầu, khung nhôm.', 'price' => 8500000, 'price_discount' => 7990000],
            ['name' => 'Kính chắn gió thể thao Polarized', 'category_id' => 4, 'image_url' => 'glasses_polarized.jpg', 'content' => 'Chống tia UV400, chống chói.', 'price' => 350000, 'price_discount' => 299000],
            ['name' => 'Khóa xe đạp dây cáp mã số', 'category_id' => 9, 'image_url' => 'lock_code.jpg', 'content' => 'Khóa 4 số, lõi thép bọc nhựa, an toàn.', 'price' => 190000, 'price_discount' => 159000],
            ['name' => 'Bơm mini cầm tay Giyo GP-05', 'category_id' => 5, 'image_url' => 'pump_giyo.jpg', 'content' => 'Nhỏ gọn, dùng cho van Presta và Schrader.', 'price' => 350000, 'price_discount' => 299000],
        ]);
    }
}
