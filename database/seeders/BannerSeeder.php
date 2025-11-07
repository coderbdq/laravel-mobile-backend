<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('banner')->insert([
            ['name' => 'Khai trương cửa hàng xe đạp', 'image_url' => 'banner_bike.jpg'],
            ['name' => 'Giảm giá mùa hè 30%', 'image_url' => 'banner_summer.jpg'],
            ['name' => 'Phụ kiện thể thao chính hãng', 'image_url' => 'banner_accessory.jpg'],
            ['name' => 'Xe đạp thể thao nhập khẩu', 'image_url' => 'banner_sport.jpg'],
            ['name' => 'Siêu ưu đãi cuối năm', 'image_url' => 'banner_sale.jpg'],
            ['name' => 'Mừng năm mới - giảm giá 50%', 'image_url' => 'banner_newyear.jpg'],
            ['name' => 'Khuyến mãi tháng 3', 'image_url' => 'banner_march.jpg'],
            ['name' => 'Tuần lễ vàng xe đạp điện', 'image_url' => 'banner_electric.jpg'],
            ['name' => 'Phụ kiện giảm giá cực sốc', 'image_url' => 'banner_accessory2.jpg'],
            ['name' => 'Tri ân khách hàng thân thiết', 'image_url' => 'banner_thanks.jpg'],
        ]);
    }
}
