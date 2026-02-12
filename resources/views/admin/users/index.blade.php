@extends('layouts.admin')

@section('title', 'Quản lý tài khoản')
@section('page-title', 'Quản lý tài khoản')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.users.create') }}"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Thêm tài khoản mới
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="text-left py-3 px-4">ID</th>
                <th class="text-left py-3 px-4">Tên</th>
                <th class="text-left py-3 px-4">Email</th>
                <th class="text-left py-3 px-4">Ngày tạo</th>
                <th class="text-left py-3 px-4">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4">{{ $user->id }}</td>
                <td class="py-3 px-4">
                    {{ $user->name }}
                    @if($user->id === auth()->id())
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800 ml-2">Bạn</span>
                    @endif
                </td>
                <td class="py-3 px-4">{{ $user->email }}</td>
                <td class="py-3 px-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                <td class="py-3 px-4">
                    <a href="{{ route('admin.users.edit', $user) }}"
                        class="text-blue-600 hover:text-blue-900 mr-3">Sửa</a>
                    @if($user->id !== auth()->id())
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline"
                        onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Xóa</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
