@extends('layouts.admin')

@section('title', 'Sản phẩm')
@section('page-title', 'Quản lý sản phẩm')

@section('content')
<div class="mb-6 flex flex-wrap items-center gap-4">
    <a href="{{ route('admin.products.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Thêm sản phẩm mới
    </a>
    <form action="{{ route('admin.products.index') }}" method="GET" class="flex items-center gap-2">
        <label for="category_id" class="text-sm font-medium text-gray-700">Lọc theo danh mục:</label>
        <select name="category_id" id="category_id" onchange="this.form.submit()"
            class="border rounded py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 min-w-[200px]">
            <option value="">Tất cả danh mục</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </form>
</div>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="text-left py-3 px-4">ID</th>
                <th class="text-left py-3 px-4">Hình ảnh</th>
                <th class="text-left py-3 px-4">Tên</th>
                <th class="text-left py-3 px-4">Danh mục</th>
                <th class="text-left py-3 px-4">Trạng thái</th>
                <th class="text-left py-3 px-4">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">{{ $product->id }}</td>
                <td class="py-3 px-4">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="h-12 w-12 object-cover rounded">
                    @endif
                </td>
                <td class="py-3 px-4">{{ $product->name }}</td>
                <td class="py-3 px-4">{{ $product->category->name }}</td>
                <td class="py-3 px-4">
                    <span
                        class="px-2 py-1 rounded text-xs {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $product->is_active ? 'Hoạt động' : 'Ẩn' }}
                    </span>
                </td>
                <td class="py-3 px-4">
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="text-blue-600 hover:text-blue-900 mr-3">Sửa</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline"
                        onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $products->links() }}
    </div>
</div>
@endsection