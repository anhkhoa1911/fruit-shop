<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->with('category')
            ->latest()
            ->take(8)
            ->get();

        $newProducts = Product::where('is_active', true)
            ->where('is_new', true)
            ->with('category')
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home', compact('featuredProducts', 'newProducts', 'categories'));
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
