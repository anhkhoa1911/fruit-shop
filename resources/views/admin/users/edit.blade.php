@extends('layouts.admin')

@section('title', 'Sửa tài khoản')
@section('page-title', 'Sửa tài khoản: ' . $user->name)

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Thông tin tài khoản -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Thông tin tài khoản</h3>
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tên *</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                    required>
                @error('name')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                    required>
                @error('email')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cập nhật
                </button>
                <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:text-gray-900">
                    Quay lại
                </a>
            </div>
        </form>
    </div>

    <!-- Đổi mật khẩu -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Đổi mật khẩu</h3>
        <form action="{{ route('admin.users.update-password', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="is_self" value="{{ $user->id === auth()->id() ? '1' : '0' }}">

            @if($user->id === auth()->id())
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu hiện tại *</label>
                <input type="password" name="current_password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('current_password') border-red-500 @enderror"
                    required>
                @error('current_password')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu mới *</label>
                <input type="password" name="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                    required>
                @error('password')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
                <p class="text-gray-600 text-xs italic mt-1">Mật khẩu tối thiểu 8 ký tự</p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Xác nhận mật khẩu mới *</label>
                <input type="password" name="password_confirmation"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>

            <button type="submit"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                Đổi mật khẩu
            </button>
        </form>
    </div>
</div>
@endsection
