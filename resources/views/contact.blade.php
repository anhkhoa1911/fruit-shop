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
                                <p>{!! nl2br(e($contactInfo['address'] ?? 'Chưa cập nhật')) !!}</p>
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
                                <p><a href="tel:{{ $contactInfo['phone'] ?? '' }}">{{ $contactInfo['phone'] ?? 'Chưa cập
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
                                <p><a href="mailto:{{ $contactInfo['email'] ?? '' }}">{{ $contactInfo['email'] ?? 'Chưa
                                        cập nhật' }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
            <div class="col-sm-6 col-xs-12 map-section equal-height googlemap">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.651716299999!2d106.701276315332!3d21.013557786006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a58f0b0d0c0a1%3A0x2c5c5c5c5c5c5c5c!2zS-G6o2kgUGjDqm4sIEhhbm9p!5e0!3m2!1svi!2s!4v1600000000000!5m2!1svi!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
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
@endsection