@extends('layouts.admin')

@section('title', 'Cài đặt')
@section('page-title', 'Cài đặt hệ thống')

@section('content')
<div class="bg-white rounded-lg shadow p-6 max-w-4xl">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Thông tin liên hệ</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Số điện thoại</label>
                    <input type="text" name="settings[0][value]" value="{{ \App\Models\Setting::get('contact_phone') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    <input type="hidden" name="settings[0][key]" value="contact_phone">
                    <input type="hidden" name="settings[0][type]" value="text">
                    <input type="hidden" name="settings[0][group]" value="contact">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="settings[1][value]"
                        value="{{ \App\Models\Setting::get('contact_email') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    <input type="hidden" name="settings[1][key]" value="contact_email">
                    <input type="hidden" name="settings[1][type]" value="text">
                    <input type="hidden" name="settings[1][group]" value="contact">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ</label>
                    <textarea name="settings[2][value]" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ \App\Models\Setting::get('contact_address') }}</textarea>
                    <input type="hidden" name="settings[2][key]" value="contact_address">
                    <input type="hidden" name="settings[2][type]" value="textarea">
                    <input type="hidden" name="settings[2][group]" value="contact">
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Giới thiệu</h2>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2">Nội dung trang giới thiệu</label>
                <textarea name="settings[3][value]" rows="10"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ \App\Models\Setting::get('about_content') }}</textarea>
                <input type="hidden" name="settings[3][key]" value="about_content">
                <input type="hidden" name="settings[3][type]" value="textarea">
                <input type="hidden" name="settings[3][group]" value="about">
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Mạng xã hội</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Facebook</label>
                    <input type="text" name="settings[4][value]"
                        value="{{ \App\Models\Setting::get('social_facebook') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    <input type="hidden" name="settings[4][key]" value="social_facebook">
                    <input type="hidden" name="settings[4][type]" value="text">
                    <input type="hidden" name="settings[4][group]" value="social">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Twitter</label>
                    <input type="text" name="settings[5][value]"
                        value="{{ \App\Models\Setting::get('social_twitter') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    <input type="hidden" name="settings[5][key]" value="social_twitter">
                    <input type="hidden" name="settings[5][type]" value="text">
                    <input type="hidden" name="settings[5][group]" value="social">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Instagram</label>
                    <input type="text" name="settings[6][value]"
                        value="{{ \App\Models\Setting::get('social_instagram') }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
                    <input type="hidden" name="settings[6][key]" value="social_instagram">
                    <input type="hidden" name="settings[6][type]" value="text">
                    <input type="hidden" name="settings[6][group]" value="social">
                </div>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xl font-bold mb-4">Hình ảnh</h2>
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Chứng nhận an toàn thực phẩm</label>
                    @php
                        $certificates = json_decode(\App\Models\Setting::get('certificates_gallery', '[]'), true) ?? [];
                    @endphp
                    @if(count($certificates))
                        <div class="flex space-x-4 overflow-x-auto pb-2 mb-2">
                            @foreach($certificates as $path)
                                @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                <div class="flex-shrink-0">
                                    @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                        <img src="{{ asset('storage/' . $path) }}" alt="certificate" class="h-20 object-contain border rounded">
                                    @else
                                        <div class="border-2 border-gray-300 rounded-lg overflow-hidden bg-white min-w-[200px]">
                                            <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                                class="w-full h-48 border-0" 
                                                title="{{ basename($path) }}">
                                            </iframe>
                                            <div class="p-2 text-center bg-gray-50 border-t border-gray-200">
                                                <a href="{{ asset('storage/' . $path) }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 underline font-semibold break-words">
                                                    {{ basename($path) }}
                                                </a>
                                                <p class="text-xs text-gray-500 mt-1">Click để mở PDF đầy đủ</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <p class="text-xs text-gray-600 mt-1 mb-1">Có thể chọn nhiều file cùng lúc (ảnh hoặc PDF).</p>
                    <input type="file" name="images[certificates][]" multiple class="block w-full text-sm text-gray-700">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nhà máy</label>
                    @php
                        $factoryGallery = json_decode(\App\Models\Setting::get('factory_gallery', '[]'), true) ?? [];
                    @endphp
                    @if(count($factoryGallery))
                        <div class="flex space-x-4 overflow-x-auto pb-2 mb-2">
                            @foreach($factoryGallery as $path)
                                @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                <div class="flex-shrink-0">
                                    @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                        <img src="{{ asset('storage/' . $path) }}" alt="factory" class="h-24 object-cover border rounded">
                                    @else
                                        <div class="border-2 border-gray-300 rounded-lg overflow-hidden bg-white min-w-[250px]">
                                            <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                                class="w-full h-48 border-0" 
                                                title="{{ basename($path) }}">
                                            </iframe>
                                            <div class="p-2 text-center bg-gray-50 border-t border-gray-200">
                                                <a href="{{ asset('storage/' . $path) }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 underline font-semibold break-words">
                                                    {{ basename($path) }}
                                                </a>
                                                <p class="text-xs text-gray-500 mt-1">Click để mở PDF đầy đủ</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="images[factory][]" multiple class="block w-full text-sm text-gray-700">
                    <p class="text-xs text-gray-500 mt-1">Ảnh nhà máy, dùng cho trang Giới thiệu (có thể chọn nhiều ảnh).</p>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Trang trại</label>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php
                            $farmGuavaGallery = json_decode(\App\Models\Setting::get('farm_guava_gallery', '[]'), true) ?? [];
                            $farmSoriGallery = json_decode(\App\Models\Setting::get('farm_sori_gallery', '[]'), true) ?? [];
                        @endphp
                        <div>
                            <p class="text-xs text-gray-600 mb-1">Trang trại ổi (Guava)</p>
                            @if(count($farmGuavaGallery))
                                <div class="flex space-x-4 overflow-x-auto pb-2 mb-2">
                                    @foreach($farmGuavaGallery as $path)
                                        @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                        <div class="flex-shrink-0">
                                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                                <img src="{{ asset('storage/' . $path) }}" alt="farm guava" class="h-24 object-cover border rounded">
                                            @else
                                                <div class="border-2 border-gray-300 rounded-lg overflow-hidden bg-white min-w-[180px]">
                                                    <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                                        class="w-full h-40 border-0" 
                                                        title="{{ basename($path) }}">
                                                    </iframe>
                                                    <div class="p-2 text-center bg-gray-50 border-t border-gray-200">
                                                        <a href="{{ asset('storage/' . $path) }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 underline font-semibold break-words">
                                                            {{ basename($path) }}
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <input type="file" name="images[farm_guava][]" multiple class="block w-full text-sm text-gray-700">
                        </div>
                        <div>
                            <p class="text-xs text-gray-600 mb-1">Trang trại sơ ri (Sori)</p>
                            @if(count($farmSoriGallery))
                                <div class="flex space-x-4 overflow-x-auto pb-2 mb-2">
                                    @foreach($farmSoriGallery as $path)
                                        @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                        <div class="flex-shrink-0">
                                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                                <img src="{{ asset('storage/' . $path) }}" alt="farm sori" class="h-24 object-cover border rounded">
                                            @else
                                                <div class="border-2 border-gray-300 rounded-lg overflow-hidden bg-white min-w-[180px]">
                                                    <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                                        class="w-full h-40 border-0" 
                                                        title="{{ basename($path) }}">
                                                    </iframe>
                                                    <div class="p-2 text-center bg-gray-50 border-t border-gray-200">
                                                        <a href="{{ asset('storage/' . $path) }}" target="_blank" class="text-xs text-blue-600 hover:text-blue-800 underline font-semibold break-words">
                                                            {{ basename($path) }}
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <input type="file" name="images[farm_sori][]" multiple class="block w-full text-sm text-gray-700">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Lưu cài đặt
            </button>
        </div>
    </form>
</div>
@endsection