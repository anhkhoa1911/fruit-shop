@extends('layouts.admin')

@section('title', 'Sửa danh mục')
@section('page-title', 'Sửa danh mục')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-2xl">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Tên danh mục *</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Mô tả</label>
            <textarea name="description" rows="4"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Hình ảnh</label>
            @if($category->image)
            <img src="{{ asset('storage/' . $category->image) }}" class="mb-2 h-32 object-cover">
            @endif
            <input type="file" name="image"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Thứ tự sắp xếp</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $category->sort_order) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active) ? 'checked'
                : '' }} class="mr-2">
                <span class="text-gray-700 text-sm font-bold">Hoạt động</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Cập nhật
            </button>
            <a href="{{ route('admin.categories.index') }}" class="text-gray-600 hover:text-gray-900">
                Hủy
            </a>
        </div>
    </form>
</div>
@endsection