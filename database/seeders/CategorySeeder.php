<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('category')->insert([
            ['name' => 'Xe đạp đường phố', 'image_url' => 'images/categorys/streetbike.png'],
            ['name' => 'Xe đạp leo núi', 'image_url' => 'images/categorys/mountain.png'],
            ['name' => 'Xe đạp trẻ em', 'image_url' => 'images/categorys/kidbike.png'],
            ['name' => 'Phụ kiện bảo hộ', 'image_url' => 'images/categorys/helmet.png'],
            ['name' => 'Dụng cụ sửa xe', 'image_url' => 'images/categorys/toolkit.png'],
            ['name' => 'Xe đạp gấp', 'image_url' => 'images/categorys/folding.png'],
            ['name' => 'Xe đạp thể thao', 'image_url' => 'images/categorys/sportbike.png'],
            ['name' => 'Xe đạp điện', 'image_url' => 'images/categorys/electric.png'],
            ['name' => 'Bình nước & phụ kiện', 'image_url' => 'images/categorys/bottle.png'],
            ['name' => 'Phụ tùng thay thế', 'image_url' => 'images/categorys/spareparts.png'],
        ]);
    }
}
