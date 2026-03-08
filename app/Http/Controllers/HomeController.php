<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Sản phẩm mới = sản phẩm thuộc danh mục có slug khác "ung-dung-va-giai-phap-san-pham"
        $newProducts = Product::where('is_active', true)
            ->whereHas('category', fn ($q) => $q->where('slug', '!=', 'ung-dung-va-giai-phap-san-pham'))
            ->with('category')
            ->latest()
            ->get();

        $posts = Post::where('is_active', true)
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('newProducts', 'posts'));
    }

    public function about()
    {
        $aboutContent = Setting::get('about_content', '');
        return view('about', compact('aboutContent'));
    }

    public function applicationSolutions()
    {
        $applicationSolutionDescription = Setting::get('application_solution_description', '');
        $applicationSolutionGallery = json_decode(Setting::get('application_solution_gallery', '[]'), true) ?: [];
        $productNames = [
            'Nước Quýt Dừa',
            'Nước Cóc Tắc',
            'Bơ Dừa Non',
            'Hồng Xiêm Cà phê',
            'Trà Trái Cây Nhiệt Đới',
            'Sầu Riêng Bơ',
            'Trà Quýt Dâu',
            'Trà Sori Xanh',
            'Trà Sữa Hồng Xiêm',
            'Dừa Dứa Tắc',
            'Cà Phê Dừa',
            'Trà Dâu',
        ];

        return view('application-solutions', compact(
            'applicationSolutionDescription',
            'applicationSolutionGallery',
            'productNames'
        ));
    }

    public function contact()
    {
        $contactInfo = [
            'phone' => Setting::get('contact_phone', ''),
            'email' => Setting::get('contact_email', ''),
            'address' => Setting::get('contact_address', ''),
        ];
        return view('contact', compact('contactInfo'));
    }
}
