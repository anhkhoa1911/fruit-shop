<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'contact_phone',
                'value' => '0123 456 789',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@fruitshop.vn',
                'type' => 'text',
                'group' => 'contact',
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Đường ABC, Phường XYZ, Quận 1, TP. Hồ Chí Minh',
                'type' => 'textarea',
                'group' => 'contact',
            ],
            [
                'key' => 'about_content',
                'value' => "Chào mừng bạn đến với Cửa hàng Trái cây Sạch!\n\nChúng tôi là địa chỉ uy tín cung cấp các loại trái cây tươi ngon, sạch sẽ, đảm bảo chất lượng và an toàn cho sức khỏe người tiêu dùng.\n\nCam kết của chúng tôi:\n- Trái cây tươi ngon, nguồn gốc rõ ràng\n- Giá cả hợp lý, cạnh tranh\n- Giao hàng nhanh chóng, đúng hẹn\n- Chăm sóc khách hàng tận tình\n\nHãy đến với chúng tôi để trải nghiệm dịch vụ tốt nhất!",
                'type' => 'textarea',
                'group' => 'about',
            ],
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/fruitshop',
                'type' => 'text',
                'group' => 'social',
            ],
            [
                'key' => 'social_twitter',
                'value' => 'https://twitter.com/fruitshop',
                'type' => 'text',
                'group' => 'social',
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://instagram.com/fruitshop',
                'type' => 'text',
                'group' => 'social',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
