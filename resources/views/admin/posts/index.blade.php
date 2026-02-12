@extends('layouts.admin')

@section('title', 'Bài viết')
@section('page-title', 'Quản lý bài viết')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.posts.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Thêm bài viết mới
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="text-left py-3 px-4">ID</th>
                <th class="text-left py-3 px-4">Thumbnail</th>
                <th class="text-left py-3 px-4">Tiêu đề</th>
                <th class="text-left py-3 px-4">Ngày tạo</th>
                <th class="text-left py-3 px-4">Lượt xem</th>
                <th class="text-left py-3 px-4">Trạng thái</th>
                <th class="text-left py-3 px-4">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">{{ $post->id }}</td>
                <td class="py-3 px-4">
                    @if($post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" class="h-16 w-24 object-cover rounded">
                    @else
                    <span class="text-gray-400 text-sm">Không có ảnh</span>
                    @endif
                </td>
                <td class="py-3 px-4">
                    <div class="font-semibold">{{ $post->title }}</div>
                    @if($post->excerpt)
                    <div class="text-sm text-gray-500 mt-1">{{ Str::limit($post->excerpt, 60) }}</div>
                    @endif
                </td>
                <td class="py-3 px-4">{{ $post->created_at->format('d/m/Y H:i') }}</td>
                <td class="py-3 px-4">{{ $post->views }}</td>
                <td class="py-3 px-4">
                    <span
                        class="px-2 py-1 rounded text-xs {{ $post->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $post->is_active ? 'Hoạt động' : 'Ẩn' }}
                    </span>
                </td>
                <td class="py-3 px-4">
                    <a href="{{ route('admin.posts.edit', $post) }}"
                        class="text-blue-600 hover:text-blue-900 mr-3">Sửa</a>
                    <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline"
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
        {{ $posts->links() }}
    </div>
</div>
@endsection
