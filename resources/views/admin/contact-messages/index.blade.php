@extends('layouts.admin')

@section('title', 'Tin nhắn liên hệ')
@section('page-title', 'Tin nhắn liên hệ')

@section('content')
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="text-left py-3 px-4">ID</th>
                <th class="text-left py-3 px-4">Họ tên</th>
                <th class="text-left py-3 px-4">Email</th>
                <th class="text-left py-3 px-4">Điện thoại</th>
                <th class="text-left py-3 px-4">Ngày gửi</th>
                <th class="text-left py-3 px-4">Trạng thái</th>
                <th class="text-left py-3 px-4">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr class="border-b hover:bg-gray-50 {{ !$message->read_at ? 'bg-blue-50' : '' }}">
                <td class="py-3 px-4">{{ $message->id }}</td>
                <td class="py-3 px-4">{{ $message->name }}</td>
                <td class="py-3 px-4">{{ $message->email }}</td>
                <td class="py-3 px-4">{{ $message->phone ?? '—' }}</td>
                <td class="py-3 px-4">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                <td class="py-3 px-4">
                    @if($message->read_at)
                    <span class="px-2 py-1 rounded text-xs bg-gray-100 text-gray-800">Đã đọc</span>
                    @else
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">Mới</span>
                    @endif
                </td>
                <td class="py-3 px-4">
                    <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-blue-600 hover:text-blue-900 mr-3">Xem</a>
                    <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa tin nhắn này?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">Xóa</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="py-8 px-4 text-center text-gray-500">Chưa có tin nhắn nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="p-4">
        {{ $messages->links() }}
    </div>
</div>
@endsection
