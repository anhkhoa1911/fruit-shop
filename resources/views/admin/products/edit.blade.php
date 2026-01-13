@extends('layouts.admin')

@section('title', 'Sửa sản phẩm')
@section('page-title', 'Sửa sản phẩm')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-3xl">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tên sản phẩm *</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Danh mục *</label>
                <select name="category_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ?
                        'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Giá *</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Giá khuyến mãi</label>
                <input type="number" step="0.01" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Đơn vị *</label>
                <input type="text" name="unit" value="{{ old('unit', $product->unit) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Số lượng *</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Mô tả ngắn</label>
                <textarea name="description" rows="3"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nội dung chi tiết</label>
                <textarea name="content" rows="6"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content', $product->content) }}</textarea>
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Hình ảnh</label>
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="mb-2 h-32 object-cover">
                @endif
                <input type="file" name="image"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="col-span-2 flex gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ?
                    'checked' : '' }} class="mr-2">
                    <span class="text-gray-700 text-sm font-bold">Hoạt động</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ?
                    'checked' : '' }} class="mr-2">
                    <span class="text-gray-700 text-sm font-bold">Nổi bật</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_new" value="1" {{ old('is_new', $product->is_new) ? 'checked' : ''
                    }} class="mr-2">
                    <span class="text-gray-700 text-sm font-bold">Mới</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="is_sale" value="1" {{ old('is_sale', $product->is_sale) ? 'checked' :
                    '' }} class="mr-2">
                    <span class="text-gray-700 text-sm font-bold">Giảm giá</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-between mt-6">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Cập nhật
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900">
                Hủy
            </a>
        </div>
    </form>
</div>
@endsection