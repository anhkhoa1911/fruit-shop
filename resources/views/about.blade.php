@extends('layouts.app')

@section('title', 'Giới thiệu')

@section('content')
<div class="clearfix"></div>

<!-- Banner -->
<section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/cart-page-banner.jpg" alt="banner" class="banner" />
</section>
<!-- /Banner -->

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li>Giới thiệu</li>
            </ul>
            <h1 class="page-tit">Giới thiệu</h1>
        </div>
    </div>
</section>
<!-- /Breadcrumb -->

<!-- Content -->
<div class="content-part about-page">
    <section class="who-we-are">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 img-part">
                    <figure>
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/about-img.jpg" alt="Cửa hàng trái cây" class="img-responsive">
                    </figure>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 txt-part">
                    <div class="sec-tit">
                        <h2><span>Chúng tôi</span> là ai</h2>
                    </div>
                    @if($aboutContent)
                    <div class="about-content">
                        {!! nl2br(e($aboutContent)) !!}
                    </div>
                    @else
                    <h3>Chuyên cung cấp trái cây tươi sạch, an toàn cho sức khỏe.</h3>
                    <p>Chào mừng bạn đến với cửa hàng trái cây của chúng tôi! Chúng tôi chuyên cung cấp các loại trái cây tươi ngon, sạch, đảm bảo chất lượng và an toàn cho sức khỏe người tiêu dùng. Với nhiều năm kinh nghiệm, chúng tôi cam kết mang đến nguồn trái cây tươi nhất từ các vườn trồng uy tín.</p>
                    <p>Trái cây của chúng tôi được chọn lọc kỹ càng, nguồn gốc rõ ràng, giá cả hợp lý. Giao hàng nhanh chóng và chăm sóc khách hàng tận tình là ưu tiên hàng đầu.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="farming-industry-section">
        <div class="container">
            <div class="row">
                <div class="pull-left col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 pull-right">
                            <div class="free-section">
                                <div class="free-inner">
                                    <h2 class="years">hơn <span>10</span> năm</h2>
                                    <div class="slogan">trong ngành<br/>trái cây tươi</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                            <div class="box first">
                                <div class="sr">01</div>
                                <div class="txt-part">
                                    <div class="tit">Chọn lọc kỹ</div>
                                    <p>Trái cây được chọn lọc từ các nguồn uy tín, đảm bảo độ tươi ngon và an toàn thực phẩm trước khi đến tay khách hàng.</p>
                                </div>
                            </div>
                            <div class="box second">
                                <div class="sr">02</div>
                                <div class="txt-part">
                                    <div class="tit">Bảo quản đúng cách</div>
                                    <p>Quy trình bảo quản chuyên nghiệp, giữ trái cây tươi lâu, giữ nguyên dinh dưỡng và hương vị tự nhiên.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 pull-right">
                    <div class="box third">
                        <div class="sr">03</div>
                        <div class="txt-part">
                            <div class="tit">Giao hàng nhanh</div>
                            <p>Đội ngũ giao hàng chuyên nghiệp, đóng gói cẩn thận, giao đúng hẹn đến tận tay khách hàng.</p>
                        </div>
                    </div>
                    <div class="box fourth">
                        <div class="sr">04</div>
                        <div class="txt-part">
                            <div class="tit">Sản phẩm hoàn hảo</div>
                            <p>Cam kết chất lượng từng sản phẩm, đổi trả dễ dàng nếu không đúng như mô tả.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="choose-us-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-8 col-xs-12">
                    <div class="tit">
                        <h2><span>Vì sao</span> chọn chúng tôi</h2>
                    </div>
                    <p>Chúng tôi không ngừng nâng cao chất lượng dịch vụ và sản phẩm để mang đến trải nghiệm mua sắm tốt nhất cho khách hàng. Chuyên môn, chất lượng và trách nhiệm là những giá trị cốt lõi.</p>
                    <div class="flow">
                        <div class="expertese">
                            <label>Chuyên môn</label>
                            <input id="Expertese" data-slider-id='expertese' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="18"/>
                        </div>
                        <div class="quality">
                            <label>Chất lượng</label>
                            <input id="Quality" data-slider-id='quality' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="16"/>
                        </div>
                        <div class="responsible">
                            <label>Trách nhiệm</label>
                            <input id="Responsible" data-slider-id='responsible' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="15"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /Content -->

<!-- Our Farmer / Đội ngũ -->
<section class="our-farmers-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2>Đội ngũ của chúng tôi</h2>
                    </div>
                </div>
                <div class="owl-carousel owl-theme our-farmer">
                    <div class="item">
                        <div class="wrapper">
                            <div class="pro-img">
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/farmer-img-1.jpg" alt="Đội ngũ" class="img-responsive center-block" />
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">Nguyễn Văn A</div>
                                <div class="post">Quản lý kho</div>
                                <ul class="social">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-camera"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="wrapper">
                            <div class="pro-img">
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/farmer-img-2.jpg" alt="Đội ngũ" class="img-responsive center-block" />
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">Trần Thị B</div>
                                <div class="post">Chuyên gia trái cây</div>
                                <ul class="social">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-camera"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="wrapper">
                            <div class="pro-img">
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/farmer-img-3.jpg" alt="Đội ngũ" class="img-responsive center-block" />
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">Lê Văn C</div>
                                <div class="post">Quản lý chất lượng</div>
                                <ul class="social">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-camera"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="wrapper">
                            <div class="pro-img">
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/farmer-img-2.jpg" alt="Đội ngũ" class="img-responsive center-block" />
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">Phạm Thị D</div>
                                <div class="post">Chăm sóc khách hàng</div>
                                <ul class="social">
                                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                                    <li><a href="#"><i class="icon-camera"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Our Farmer -->

<!-- Brand logo -->
<section class="brand">
    <div class="container">
        <h3 class="sr-only">Đối tác</h3>
        <div class="owl-carousel owl-theme brand-slider">
            <div class="item"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/brand-1.png" alt="brand 01" class="img-responsive" /></div>
            <div class="item"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/brand-2.png" alt="brand 02" class="img-responsive" /></div>
            <div class="item"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/brand-3.png" alt="brand 03" class="img-responsive" /></div>
            <div class="item"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/brand-4.png" alt="brand 04" class="img-responsive" /></div>
            <div class="item"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/brand-5.png" alt="brand 05" class="img-responsive" /></div>
            <div class="item"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/brand-6.png" alt="brand 06" class="img-responsive" /></div>
        </div>
    </div>
</section>
<!-- /Brand logo -->

<div class="clearfix"></div>

<!-- Services provide -->
<section class="helpline">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="bgreen">
                    <div class="inline">
                        <div class="box">
                            <div class="icon"><i class="icon-delivery-truck"></i></div>
                            <div class="text-part">
                                <h3>Giao hàng miễn phí</h3>
                                <p>Toàn quốc</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="icon-headphones"></i></div>
                            <div class="text-part">
                                <h3>Hỗ trợ 24/7</h3>
                                <p>Khách hàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="icon-shuffle"></i></div>
                            <div class="text-part">
                                <h3>Đổi trả</h3>
                                <p>Dễ dàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="icon-phone-call"></i></div>
                            <div class="text-part">
                                <h3>Hotline</h3>
                                <p><a href="tel:{{ \App\Models\Setting::get('contact_phone') }}">{{ \App\Models\Setting::get('contact_phone', '0123456789') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Services provide -->

@push('scripts')
<script>
$(document).ready(function() {
    if (typeof $.fn.slider === 'function') {
        $('#Expertese').slider({ tooltip: 'always' });
        $('#Quality').slider({ tooltip: 'always' });
        $('#Responsible').slider({ tooltip: 'always' });
    }
});
</script>
@endpush
@endsection
