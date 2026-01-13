<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Cam Sành',
                'slug' => 'cam-sanh',
                'description' => 'Cam sành Hà Giang ngọt thanh, múi mọng nước',
                'content' => 'Cam sành Hà Giang là đặc sản nổi tiếng với vị ngọt thanh, múi cam mọng nước. Giàu vitamin C, tốt cho sức khỏe.',
                'price' => 35000,
                'sale_price' => null,
                'unit' => 'kg',
                'stock' => 100,
                'is_featured' => true,
                'is_new' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Táo Fuji',
                'slug' => 'tao-fuji',
                'description' => 'Táo Fuji giòn ngọt, nhập khẩu từ Nhật Bản',
                'content' => 'Táo Fuji nổi tiếng với độ giòn và vị ngọt đặc trưng. Giàu chất xơ và vitamin.',
                'price' => 120000,
                'sale_price' => 99000,
                'unit' => 'kg',
                'stock' => 50,
                'is_featured' => true,
                'is_sale' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Xoài Cát Hòa Lộc',
                'slug' => 'xoai-cat-hoa-loc',
                'description' => 'Xoài cát Hòa Lộc Tiền Giang ngọt thơm',
                'content' => 'Xoài cát Hòa Lộc là đặc sản nổi tiếng của Tiền Giang. Thịt xoài vàng óng, thơm ngọt.',
                'price' => 65000,
                'sale_price' => null,
                'unit' => 'kg',
                'stock' => 80,
                'is_featured' => true,
                'is_new' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Nho Mỹ',
                'slug' => 'nho-my',
                'description' => 'Nho tím không hạt nhập khẩu từ Mỹ',
                'content' => 'Nho tím Mỹ ngọt thanh, không hạt, giàu chất chống oxi hóa.',
                'price' => 150000,
                'sale_price' => 135000,
                'unit' => 'kg',
                'stock' => 30,
                'is_sale' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'name' => 'Cherry Úc',
                'slug' => 'cherry-uc',
                'description' => 'Cherry đỏ tươi nhập khẩu từ Úc',
                'content' => 'Cherry Úc có màu đỏ tươi, vị ngọt thanh, giàu vitamin C và chất chống oxi hóa.',
                'price' => 450000,
                'sale_price' => null,
                'unit' => 'kg',
                'stock' => 15,
                'is_featured' => true,
                'is_new' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Mít sấy giòn',
                'slug' => 'mit-say-gion',
                'description' => 'Mít sấy giòn thơm ngon, không chất bảo quản',
                'content' => 'Mít sấy giòn được chế biến từ mít tươi, giữ nguyên hương vị và dinh dưỡng.',
                'price' => 180000,
                'sale_price' => 160000,
                'unit' => 'hộp 500g',
                'stock' => 40,
                'is_sale' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 3,
                'name' => 'Chuối sấy',
                'slug' => 'chuoi-say',
                'description' => 'Chuối sấy dẻo thơm, bổ dưỡng',
                'content' => 'Chuối sấy giàu kali và chất xơ, tốt cho tiêu hóa và tim mạch.',
                'price' => 120000,
                'sale_price' => null,
                'unit' => 'hộp 500g',
                'stock' => 60,
                'is_active' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Dâu tây Organic Đà Lạt',
                'slug' => 'dau-tay-organic-da-lat',
                'description' => 'Dâu tây hữu cơ Đà Lạt ngọt thanh',
                'content' => 'Dâu tây organic được trồng theo phương pháp hữu cơ, không sử dụng hóa chất.',
                'price' => 250000,
                'sale_price' => null,
                'unit' => 'kg',
                'stock' => 20,
                'is_featured' => true,
                'is_new' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Bơ Organic',
                'slug' => 'bo-organic',
                'description' => 'Bơ booth hữu cơ sạch, béo ngậy',
                'content' => 'Bơ organic giàu chất béo tốt, vitamin E và các khoáng chất quan trọng.',
                'price' => 180000,
                'sale_price' => 170000,
                'unit' => 'kg',
                'stock' => 25,
                'is_sale' => true,
                'is_active' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Thanh Long Ruột Đỏ',
                'slug' => 'thanh-long-ruot-do',
                'description' => 'Thanh long ruột đỏ Bình Thuận ngọt mát',
                'content' => 'Thanh long ruột đỏ giàu chất xơ, vitamin C và chất chống oxi hóa.',
                'price' => 45000,
                'sale_price' => null,
                'unit' => 'kg',
                'stock' => 70,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
