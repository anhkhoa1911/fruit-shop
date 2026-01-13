@extends('layouts.app')

@section('title', 'Liên hệ')

@section('content')
<div class="clearfix"></div>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-tit">
                    <h2><span>Liên hệ</span> với chúng tôi</h2>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h4>Thông tin liên hệ</h4>

                <div class="mt-4">
                    <div class="mb-3">
                        <i class="icon-placeholder"></i>
                        <strong>Địa chỉ:</strong><br>
                        {{ $contactInfo['address'] ?? 'Chưa cập nhật' }}
                    </div>

                    <div class="mb-3">
                        <i class="icon-phone-call"></i>
                        <strong>Điện thoại:</strong><br>
                        <a href="tel:{{ $contactInfo['phone'] }}">{{ $contactInfo['phone'] ?? 'Chưa cập nhật' }}</a>
                    </div>

                    <div class="mb-3">
                        <i class="icon-envelope"></i>
                        <strong>Email:</strong><br>
                        <a href="mailto:{{ $contactInfo['email'] }}">{{ $contactInfo['email'] ?? 'Chưa cập nhật' }}</a>
                    </div>
                </div>

                <div class="mt-4">
                    <h5>Giờ làm việc</h5>
                    <p>Thứ 2 - Thứ 7: 8:00 - 20:00<br>
                        Chủ nhật: 8:00 - 18:00</p>
                </div>
            </div>

            <div class="col-md-6">
                <h4>Gửi tin nhắn</h4>

                <form class="mt-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Họ tên *" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email *" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" placeholder="Nội dung *" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Gửi tin nhắn</button>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>
@endsection