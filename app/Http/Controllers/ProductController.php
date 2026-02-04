<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->get('sort') === 'name_asc') {
            $query->orderBy('name');
        } elseif ($request->get('sort') === 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->latest();
        }

        $perPage = in_array((int) $request->get('per_page'), [12, 24, 30]) ? (int) $request->get('per_page') : 12;
        $products = $query->paginate($perPage)->withQueryString();
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $topSellers = Product::where('is_active', true)->where('is_featured', true)->take(3)->get();

        return view('products.index', compact('products', 'categories', 'topSellers'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();

        $product->increment('views');

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function category(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $query = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->with('category');

        if ($request->get('sort') === 'name_asc') {
            $query->orderBy('name');
        } elseif ($request->get('sort') === 'name_desc') {
            $query->orderBy('name', 'desc');
        } else {
            $query->latest();
        }

        $perPage = in_array((int) $request->get('per_page'), [12, 24, 30]) ? (int) $request->get('per_page') : 12;
        $products = $query->paginate($perPage)->withQueryString();
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        $topSellers = Product::where('is_active', true)->where('is_featured', true)->take(3)->get();

        return view('products.category', compact('category', 'products', 'categories', 'topSellers'));
    }
}
