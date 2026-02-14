@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">Tổng sản phẩm</h3>
        <p class="text-3xl font-bold mt-2">{{ $stats['total_products'] }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">Sản phẩm hoạt động</h3>
        <p class="text-3xl font-bold mt-2">{{ $stats['active_products'] }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">Danh mục</h3>
        <p class="text-3xl font-bold mt-2">{{ $stats['total_categories'] }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm">Người dùng</h3>
        <p class="text-3xl font-bold mt-2">{{ $stats['total_users'] }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b">
        <h2 class="text-xl font-bold">Sản phẩm mới nhất</h2>
    </div>
    <div class="p-6">
        <table class="w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left py-2">Tên sản phẩm</th>
                    <th class="text-left py-2">Danh mục</th>
                    <th class="text-left py-2">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestProducts as $product)
                <tr class="border-b">
                    <td class="py-3">{{ $product->name }}</td>
                    <td class="py-3">{{ $product->category->name }}</td>
                    <td class="py-3">
                        <span
                            class="px-2 py-1 rounded {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->is_active ? 'Hoạt động' : 'Không hoạt động' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection