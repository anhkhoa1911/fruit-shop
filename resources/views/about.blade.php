@extends('layouts.app')

@section('title', 'Giới thiệu')

@section('content')
<div class="clearfix"></div>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-tit">
                    <h2><span>Giới thiệu</span> về chúng tôi</h2>
                </div>

                <div class="content mt-4">
                    @if($aboutContent)
                    {!! nl2br(e($aboutContent)) !!}
                    @else
                    <p>Chào mừng bạn đến với cửa hàng trái cây của chúng tôi!</p>
                    <p>Chúng tôi chuyên cung cấp các loại trái cây tươi ngon, sạch, đảm bảo chất lượng và an toàn cho
                        sức khỏe.</p>
                    <h4 class="mt-4">Cam kết của chúng tôi:</h4>
                    <ul>
                        <li>Trái cây tươi ngon, nguồn gốc rõ ràng</li>
                        <li>Giá cả hợp lý, cạnh tranh</li>
                        <li>Giao hàng nhanh chóng, đúng hẹn</li>
                        <li>Chăm sóc khách hàng tận tình</li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<!-- Services provide -->
<section class="helpline">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="bgreen">
                    <div class="inline">
                        <div class="box">
                            <div class="icon"> <i class="icon-delivery-truck"></i> </div>
                            <div class="text-part">
                                <h3>Giao hàng miễn phí</h3>
                                <p>Toàn quốc</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="icon-headphones"></i> </div>
                            <div class="text-part">
                                <h3>Hỗ trợ 24/7</h3>
                                <p>Khách hàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="icon-shuffle"></i> </div>
                            <div class="text-part">
                                <h3>Đổi trả</h3>
                                <p>Dễ dàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="icon-phone-call"></i> </div>
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
</section>
<!-- /Services provide -->
@endsection