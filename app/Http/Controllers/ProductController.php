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

        // Lọc theo giá
        if ($request->has('min_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($subQ) use ($request) {
                    // Sản phẩm sale: dùng sale_price
                    $subQ->where('is_sale', true)
                         ->where('sale_price', '>=', $request->min_price);
                })->orWhere(function($subQ) use ($request) {
                    // Sản phẩm không sale: dùng price
                    $subQ->where('is_sale', false)
                         ->where('price', '>=', $request->min_price);
                });
            });
        }

        if ($request->has('max_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($subQ) use ($request) {
                    // Sản phẩm sale: dùng sale_price
                    $subQ->where('is_sale', true)
                         ->where('sale_price', '<=', $request->max_price);
                })->orWhere(function($subQ) use ($request) {
                    // Sản phẩm không sale: dùng price
                    $subQ->where('is_sale', false)
                         ->where('price', '<=', $request->max_price);
                });
            });
        }

        // Sắp xếp
        if ($request->get('sort') === 'name_asc') {
            $query->orderBy('name');
        } elseif ($request->get('sort') === 'name_desc') {
            $query->orderBy('name', 'desc');
        } elseif ($request->get('sort') === 'price_asc') {
            $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) ASC');
        } elseif ($request->get('sort') === 'price_desc') {
            $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) DESC');
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

        // Lọc theo giá
        if ($request->has('min_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($subQ) use ($request) {
                    // Sản phẩm sale: dùng sale_price
                    $subQ->where('is_sale', true)
                         ->where('sale_price', '>=', $request->min_price);
                })->orWhere(function($subQ) use ($request) {
                    // Sản phẩm không sale: dùng price
                    $subQ->where('is_sale', false)
                         ->where('price', '>=', $request->min_price);
                });
            });
        }

        if ($request->has('max_price')) {
            $query->where(function($q) use ($request) {
                $q->where(function($subQ) use ($request) {
                    // Sản phẩm sale: dùng sale_price
                    $subQ->where('is_sale', true)
                         ->where('sale_price', '<=', $request->max_price);
                })->orWhere(function($subQ) use ($request) {
                    // Sản phẩm không sale: dùng price
                    $subQ->where('is_sale', false)
                         ->where('price', '<=', $request->max_price);
                });
            });
        }

        // Sắp xếp
        if ($request->get('sort') === 'name_asc') {
            $query->orderBy('name');
        } elseif ($request->get('sort') === 'name_desc') {
            $query->orderBy('name', 'desc');
        } elseif ($request->get('sort') === 'price_asc') {
            $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) ASC');
        } elseif ($request->get('sort') === 'price_desc') {
            $query->orderByRaw('COALESCE(NULLIF(sale_price, 0), price) DESC');
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
