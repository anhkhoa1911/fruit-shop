<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Trái cây tươi',
                'slug' => 'trai-cay-tuoi',
                'description' => 'Các loại trái cây tươi ngon, được nhập về hàng ngày',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Trái cây nhập khẩu',
                'slug' => 'trai-cay-nhap-khau',
                'description' => 'Trái cây nhập khẩu cao cấp từ các nước',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Trái cây sấy khô',
                'slug' => 'trai-cay-say-kho',
                'description' => 'Trái cây sấy khô, giữ nguyên dinh dưỡng',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Trái cây organic',
                'slug' => 'trai-cay-organic',
                'description' => 'Trái cây hữu cơ, không hóa chất',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
