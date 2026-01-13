@extends('layouts.admin')

@section('title', 'Danh mục')
@section('page-title', 'Quản lý danh mục')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.categories.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Thêm danh mục mới
    </a>
</div>

<div class="bg-white rounded-lg shadow">
    <table class="w-full">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="text-left py-3 px-4">ID</th>
                <th class="text-left py-3 px-4">Tên</th>
                <th class="text-left py-3 px-4">Slug</th>
                <th class="text-left py-3 px-4">Sắp xếp</th>
                <th class="text-left py-3 px-4">Trạng thái</th>
                <th class="text-left py-3 px-4">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">{{ $category->id }}</td>
                <td class="py-3 px-4">{{ $category->name }}</td>
                <td class="py-3 px-4">{{ $category->slug }}</td>
                <td class="py-3 px-4">{{ $category->sort_order }}</td>
                <td class="py-3 px-4">
                    <span
                        class="px-2 py-1 rounded {{ $category->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $category->is_active ? 'Hoạt động' : 'Không hoạt động' }}
                    </span>
                </td>
                <td class="py-3 px-4">
                    <a href="{{ route('admin.categories.edit', $category) }}"
                        class="text-blue-600 hover:text-blue-900 mr-3">Sửa</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
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
        {{ $categories->links() }}
    </div>
</div>
@endsection