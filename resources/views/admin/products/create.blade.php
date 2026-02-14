@extends('layouts.admin')

@section('title', 'Thêm sản phẩm')
@section('page-title', 'Thêm sản phẩm mới')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-3xl">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tên sản phẩm *</label>
                <input type="text" name="name" value="{{ old('name') }}"
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
                    <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Mô tả ngắn</label>
                <textarea name="description" rows="3"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description') }}</textarea>
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nội dung chi tiết</label>
                <textarea name="content" rows="6"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Hình ảnh chính</label>
                <input type="file" name="image" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-xs text-gray-500 mt-1">Hình đại diện sản phẩm (hiển thị trong danh sách)</p>
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2">Thư viện hình ảnh</label>
                <input type="file" name="gallery[]" multiple accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <p class="text-xs text-gray-500 mt-1">Có thể chọn nhiều hình cùng lúc (hiển thị trong trang chi tiết sản phẩm)</p>
            </div>

            <div class="col-span-2">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        class="mr-2">
                    <span class="text-gray-700 text-sm font-bold">Hoạt động</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-between mt-6">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tạo sản phẩm
            </button>
            <a href="{{ route('admin.products.index') }}" class="text-gray-600 hover:text-gray-900">
                Hủy
            </a>
        </div>
    </form>
</div>
@endsection