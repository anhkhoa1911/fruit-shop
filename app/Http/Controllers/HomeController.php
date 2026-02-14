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
        // Sản phẩm nổi bật = tất cả sản phẩm trong danh mục slug "ung-dung-va-giai-phap-san-pham"
        $featuredProducts = Product::where('is_active', true)
            ->whereHas('category', fn ($q) => $q->where('slug', 'ung-dung-va-giai-phap-san-pham'))
            ->with('category')
            ->latest()
            ->get();

        // Sản phẩm mới = sản phẩm thuộc danh mục có slug khác "ung-dung-va-giai-phap-san-pham"
        $newProducts = Product::where('is_active', true)
            ->whereHas('category', fn ($q) => $q->where('slug', '!=', 'ung-dung-va-giai-phap-san-pham'))
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $dealProducts = Product::where('is_active', true)
            ->where('is_sale', true)
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $posts = Post::where('is_active', true)
            ->latest()
            ->take(4)
            ->get();

        return view('home', compact('featuredProducts', 'newProducts', 'dealProducts', 'categories', 'posts'));
    }

    public function about()
    {
        $aboutContent = Setting::get('about_content', '');
        return view('about', compact('aboutContent'));
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
