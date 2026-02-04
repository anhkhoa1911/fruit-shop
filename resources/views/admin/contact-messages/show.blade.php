@extends('layouts.admin')

@section('title', 'Chi tiết tin nhắn')
@section('page-title', 'Chi tiết tin nhắn')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.contact-messages.index') }}" class="text-blue-600 hover:text-blue-900">← Quay lại danh sách</a>
</div>

<div class="bg-white rounded-lg shadow p-6 max-w-3xl">
    <dl class="space-y-4">
        <div>
            <dt class="text-sm font-bold text-gray-500">Họ tên</dt>
            <dd class="mt-1">{{ $contactMessage->name }}</dd>
        </div>
        <div>
            <dt class="text-sm font-bold text-gray-500">Email</dt>
            <dd class="mt-1"><a href="mailto:{{ $contactMessage->email }}" class="text-blue-600">{{ $contactMessage->email }}</a></dd>
        </div>
        <div>
            <dt class="text-sm font-bold text-gray-500">Điện thoại</dt>
            <dd class="mt-1">
                @if($contactMessage->phone)
                <a href="tel:{{ $contactMessage->phone }}" class="text-blue-600">{{ $contactMessage->phone }}</a>
                @else
                —
                @endif
            </dd>
        </div>
        <div>
            <dt class="text-sm font-bold text-gray-500">Ngày gửi</dt>
            <dd class="mt-1">{{ $contactMessage->created_at->format('d/m/Y H:i') }}</dd>
        </div>
        <div>
            <dt class="text-sm font-bold text-gray-500">Nội dung</dt>
            <dd class="mt-1 whitespace-pre-wrap rounded bg-gray-50 p-4">{{ $contactMessage->message }}</dd>
        </div>
        @if($contactMessage->read_at)
        <div>
            <dt class="text-sm font-bold text-gray-500">Đã đọc lúc</dt>
            <dd class="mt-1">{{ $contactMessage->read_at->format('d/m/Y H:i') }}</dd>
        </div>
        @endif
    </dl>

    <div class="mt-6 pt-6 border-t">
        <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" class="inline" onsubmit="return confirm('Bạn có chắc muốn xóa tin nhắn này?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Xóa tin nhắn</button>
        </form>
    </div>
</div>
@endsection
