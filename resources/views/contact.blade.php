@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
<div class="clearfix"></div>

<!-- Banner -->
<section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img class="banner" src="{{ asset('images/cart-page-banner.jpg') }}"
        alt="banner" />
</section>
<!-- /Banner -->

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li>Liên hệ</li>
            </ul>
        </div>
    </div>
</section>
<!-- /Breadcrumb -->

<!-- Content -->
<div class="content-part contact-page">
    <section class="address-part">
        <div class="container">
            <div class="row">
                <div class="inner-part">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="box address-box">
                            <div class="icon-part">
                                <img src="{{ asset('images/location-icon.png') }}"
                                    alt="địa chỉ" class="img-responsive center-block" />
                            </div>
                            <div class="tit">
                                <h3>Địa chỉ</h3>
                                <p style="margin: 0 30px">{!! nl2br(e($contactInfo['address'] ?? 'Chưa cập nhật')) !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="box phone-box">
                            <div class="icon-part">
                                <img src="{{ asset('images/phone-icon.png') }}"
                                    alt="điện thoại" class="img-responsive center-block" />
                            </div>
                            <div class="tit">
                                <h3>Điện thoại</h3>
                                <p style="margin: 0 30px"><a href="tel:{{ $contactInfo['phone'] ?? '' }}">{{ $contactInfo['phone'] ?? 'Chưa cập
                                        nhật' }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="box email-box">
                            <div class="icon-part">
                                <img src="{{ asset('images/message-icon.png') }}"
                                    alt="email" class="img-responsive center-block" />
                            </div>
                            <div class="tit">
                                <h3>Email</h3>
                                <p style="margin: 0 30px"><a href="mailto:{{ $contactInfo['email'] ?? '' }}">{{ $contactInfo['email'] ?? 'Chưa
                                        cập nhật' }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $faqs = [
            [
                'question' => 'Trái cây đông lạnh có còn dinh dưỡng không?',
                'answer' => [
                    'Có. Trên thực tế, nhiều nghiên cứu cho thấy trái cây đông lạnh có thể giữ lại phần lớn vitamin và khoáng chất nếu được cấp đông đúng quy trình.',
                    'Do trái cây được cấp đông ngay sau khi thu hoạch, nên giá trị dinh dưỡng thường được bảo toàn tốt so với trái cây tươi bảo quản lâu ngày.',
                ],
            ],
            [
                'question' => 'Trái cây đông lạnh có sử dụng chất bảo quản không?',
                'answer' => [
                    'Thông thường trái cây đông lạnh không cần sử dụng chất bảo quản.',
                    'Quá trình cấp đông ở nhiệt độ thấp giúp ức chế vi khuẩn và kéo dài thời gian bảo quản tự nhiên của sản phẩm.',
                ],
            ],
            [
                'question' => 'Trái cây đông lạnh có thể bảo quản được bao lâu?',
                'answer' => [
                    'Tùy theo loại trái cây và điều kiện bảo quản, trái cây đông lạnh có thể bảo quản từ <b>12</b> đến <b>24</b> tháng nếu được giữ ở nhiệt độ đông lạnh thích hợp (thường từ <b>-10°C</b> trở xuống).',
                ],
            ],
            [
                'question' => 'Trái cây đông lạnh thường được dùng trong những sản phẩm nào?',
                'answer' => [
                    'Trái cây đông lạnh được sử dụng rất rộng rãi trong ngành thực phẩm, đặc biệt là:',
                ],
                'list' => [
                    '• Smoothie và nước ép',
                    '• Trà trái cây',
                    '• Kem và yogurt',
                    '• Bánh và dessert',
                    '• Topping cho đồ uống',
                    '• Nguyên liệu cho sản xuất thực phẩm',
                ],
            ],
            [
                'question' => 'Trái cây đông lạnh có an toàn không?',
                'answer' => [
                    'Trái cây đông lạnh được sản xuất theo các tiêu chuẩn an toàn thực phẩm như <b>HACCP</b> và <b>ISO</b>, đảm bảo quy trình chế biến và bảo quản đạt tiêu chuẩn chất lượng.',
                    'Khi được sản xuất và bảo quản đúng cách, trái cây đông lạnh hoàn toàn an toàn cho người tiêu dùng.',
                ],
            ],
        ];
    @endphp

    <section class="map-form">
        <div class="row no-gutter">
            <div class="col-sm-6 col-xs-12 form-part equal-height">
                <div class="inner-part">
                    <div class="tit">
                        <h3><span>Liên hệ</span> với chúng tôi</h3>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success" style="margin-bottom: 15px;">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger" style="margin-bottom: 15px;">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger" style="margin-bottom: 15px;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="text" name="name" class="form-control" placeholder="Họ tên"
                                value="{{ old('name') }}" required />
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}" required />
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <input type="text" name="phone" class="form-control" placeholder="Số điện thoại"
                                value="{{ old('phone') }}" />
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <textarea name="message" class="form-control" placeholder="Nội dung tin nhắn"
                                rows="5">{{ old('message') }}</textarea>
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" class="submit">Gửi tin nhắn</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12 map-section equal-height contact-faq-section">
                <div class="faq-page contact-faq-page">
                    <div class="contact-faq-heading tit">
                        <h3><span>Câu hỏi</span> thường gặp</h3>
                    </div>
                    <div class="faq-panel text-left">
                        <div class="panel-group" id="accordion">
                            @foreach($faqs as $faq)
                            <div class="panel panel-default panel-help">
                                <div class="panel-heading @if($loop->first) add @endif">
                                    <h4 class="panel-title accordion-toggle @if(!$loop->first) collapsed @endif"
                                        data-toggle="collapse"
                                        data-parent="#accordion"
                                        data-target="#contactFaq{{ $loop->iteration }}">
                                        {{ $faq['question'] }}
                                        <i class="icon-add"></i>
                                    </h4>
                                </div>
                                <div id="contactFaq{{ $loop->iteration }}" class="panel-collapse collapse @if($loop->first) in @endif">
                                    <div class="panel-body">
                                        @foreach($faq['answer'] as $paragraph)
                                        <p>{!! $paragraph !!}</p>
                                        @endforeach

                                        @if(!empty($faq['list']))
                                        <ul>
                                            @foreach($faq['list'] as $item)
                                            <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /Content -->

<!-- Services provide -->
{{-- <section class="helpline">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="bgreen">
                    <div class="inline">
                        <div class="box">
                            <div class="icon"><i class="fas fa-truck"></i></div>
                            <div class="text-part">
                                <h3>Giao hàng miễn phí</h3>
                                <p>Toàn quốc</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="fas fa-headset"></i></div>
                            <div class="text-part">
                                <h3>Hỗ trợ 24/7</h3>
                                <p>Khách hàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="fas fa-exchange-alt"></i></div>
                            <div class="text-part">
                                <h3>Đổi trả</h3>
                                <p>Dễ dàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="fas fa-phone"></i></div>
                            <div class="text-part">
                                <h3>Hotline</h3>
                                <p><a href="tel:{{ \App\Models\Setting::get('contact_phone') }}">{{
                                        \App\Models\Setting::get('contact_phone', '0123456789') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- /Services provide -->
<style>
    .contact-faq-section {
        background: #f7fbf4;
    }

    .contact-faq-page {
        height: 100%;
        max-height: 720px;
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
    }

    .contact-faq-heading {
        margin: 28px 0;
    }

    .contact-faq-heading h3 {
        margin: 0 0 12px;
        font-size: 42px;
        line-height: 1.15;
        color: #2f3a2d;
    }

    .contact-faq-heading h3 span {
        color: #549843;
    }

    .contact-faq-subtitle {
        margin: 0;
        color: #6d7468;
        font-size: 16px;
        line-height: 1.8;
    }

    .contact-faq-page.faq-page {
        padding-top: 0;
        padding-bottom: 0;
    }

    .contact-faq-page .faq-panel .panel-group {
        float: none;
        max-height: 100%;
        overflow-y: auto;
        padding-right: 8px;
    }

    .contact-faq-page .faq-panel {
        flex: 1 1 auto;
        min-height: 0;
        overflow: hidden;
    }

    .contact-faq-page .faq-panel .panel-group::-webkit-scrollbar {
        width: 6px;
    }

    .contact-faq-page .faq-panel .panel-group::-webkit-scrollbar-thumb {
        background: rgba(84, 152, 67, 0.35);
        border-radius: 999px;
    }

    .contact-faq-page .panel-help {
        margin-bottom: 14px !important;
        background: #fff;
        border: 1px solid rgba(84, 152, 67, 0.14) !important;
        border-radius: 18px !important;
        overflow: hidden;
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.06);
    }

    .contact-faq-page .panel-help .panel-heading {
        padding-right: 20px;
        padding-left: 20px;
    }

    .contact-faq-page .panel-help .panel-heading:after {
        display: none;
    }

    .contact-faq-page .panel-heading.add,
    .contact-faq-page .panel-collapse {
        background: #fff;
    }

    .contact-faq-page .panel-help .panel-heading h4 {
        color: #3b3937;
        font-size: 17px;
        line-height: 1.55;
        font-weight: 700;
        cursor: pointer;
        padding-right: 54px;
    }

    .contact-faq-page .panel-help .panel-heading.add h4 {
        color: #2f3a2d;
        font-size: 17px;
    }

    .contact-faq-page .panel-help .panel-heading h4 i {
        top: 50%;
        right: 0;
        width: 28px;
        height: 28px;
        margin-top: -14px;
        border-radius: 50%;
        background: #edf7e8;
        color: #549843;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-faq-page .panel-help .panel-heading h4 i:before {
        content: '+';
        font-family: inherit !important;
        font-style: normal;
        font-size: 20px;
        font-weight: 700;
        line-height: 1;
        margin: 0;
        width: auto;
        height: auto;
    }

    .contact-faq-page .panel-help .panel-heading.add h4 i:before {
        content: '−';
    }

    .contact-faq-page .panel-body {
        padding: 0 48px 26px 20px;
        color: #666;
        font-size: 16px;
        line-height: 1.9;
    }

    .contact-faq-page .panel-body p {
        margin: 0 0 12px;
    }

    .contact-faq-page .panel-body p:last-child {
        margin-bottom: 0;
    }

    .contact-faq-page .panel-body ul {
        margin: 8px 0 0;
        padding-left: 20px;
    }

    .contact-faq-page .panel-body li {
        margin-bottom: 6px;
    }

    @media (max-width: 767px) {
        .contact-faq-page {
            max-height: none;
            padding: 34px 20px;
            display: block;
        }

        .contact-faq-heading {
            margin-bottom: 22px;
        }

        .contact-faq-heading h3 {
            font-size: 30px;
            line-height: 1.2;
        }

        .contact-faq-subtitle {
            font-size: 15px;
            line-height: 1.75;
        }

        .contact-faq-page .panel-help .panel-heading {
            padding-left: 16px;
            padding-right: 16px;
        }

        .contact-faq-page .panel-help .panel-heading h4,
        .contact-faq-page .panel-help .panel-heading.add h4 {
            font-size: 16px;
            padding-right: 46px;
        }

        .contact-faq-page .panel-help .panel-heading h4 i {
            width: 24px;
            height: 24px;
            margin-top: -12px;
        }

        .contact-faq-page .panel-help .panel-heading h4 i:before {
            font-size: 18px;
        }

        .contact-faq-page .panel-body {
            padding: 0 16px 18px;
            font-size: 15px;
        }

        .contact-faq-page .faq-panel,
        .contact-faq-page .faq-panel .panel-group {
            overflow: visible;
            max-height: none;
            padding-right: 0;
        }
    }
</style>
@endsection