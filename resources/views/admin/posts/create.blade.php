@extends('layouts.admin')

@section('title', 'Thêm bài viết')
@section('page-title', 'Thêm bài viết mới')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-4xl">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Tiêu đề *</label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                required>
            @error('title')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Mô tả ngắn</label>
            <textarea name="excerpt" rows="3"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('excerpt') }}</textarea>
            <p class="text-gray-600 text-xs italic mt-1">Tối đa 500 ký tự</p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nội dung</label>
            <textarea name="content" rows="10"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Thumbnail</label>
            <input type="file" name="thumbnail" accept="image/*"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <p class="text-xs text-gray-500 mt-1">Hình ảnh đại diện cho bài viết (tối đa 2MB)</p>
        </div>

        <div class="mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                    class="mr-2">
                <span class="text-gray-700 text-sm font-bold">Hoạt động</span>
            </label>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Tạo bài viết
            </button>
            <a href="{{ route('admin.posts.index') }}" class="text-gray-600 hover:text-gray-900">
                Hủy
            </a>
        </div>
    </form>
</div>
@endsection
