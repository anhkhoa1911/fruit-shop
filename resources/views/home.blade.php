@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="clearfix"></div>

<!-- Banner Carousel -->
<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
    <div class="slides" data-group="slides">
        <ul>
            <li>
                <div class="slide-body" data-group="slide">
                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/slider-banner.jpg" alt="banner">
                    <div class="carouseal-caption">
                        <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500"
                            data-length="300">
                            <div class="sub-tit">Trái cây sạch, tươi ngon</div>
                            <h2><span>100%</span> Organic</h2>
                            <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800"
                                data-length="300">An toàn cho sức khỏe</div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /Banner Carousel -->

<div class="clearfix"></div>

<!-- Fresh Collection -->
<section class="fress-entry-section">
    <div class="pos-absolute">
        <div class="container">
            <div class="row">
                @foreach($categories->take(3) as $category)
                <div class="col-sm-4 col-xs-12">
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                        class="img-responsive" />
                    @else
                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/fresh-fruits-img.jpg"
                        alt="{{ $category->name }}" class="img-responsive" />
                    @endif
                    <div class="tit-btn-wrapper">
                        <h2 class="tit"><span>{{ $category->name }}</span></h2>
                        <a href="{{ route('products.category', $category->slug) }}" class="btn">Xem sản phẩm</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</section>
<!-- /Fresh Collection -->

<div class="clearfix"></div>

<!-- New Arrival -->
<section class="new-arrivals-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2><span>Sản phẩm</span> mới</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="owl-carousel owl-theme new-arrivals-slider">
                    @foreach($newProducts as $product)
                    <div class="item">
                        <div class="wrapper">
                            <div class="pro-img">
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-responsive" />
                                @else
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/new-arrivals-img-1.jpg"
                                    alt="{{ $product->name }}" class="img-responsive" />
                                @endif
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">{{ $product->name }}</div>
                                <div class="price">
                                    @if($product->sale_price)
                                    <div class="new-price">{{ number_format($product->sale_price) }}đ</div>
                                    <div class="old-price"><del>{{ number_format($product->price) }}đ</del></div>
                                    @else
                                    <div class="new-price">{{ number_format($product->price) }}đ</div>
                                    @endif
                                </div>
                                <div class="btn-part">
                                    <a href="{{ route('products.show', $product->slug) }}" class="cart-btn">Xem chi
                                        tiết</a>
                                </div>
                            </div>
                            @if($product->is_new)
                            <div class="new">mới</div>
                            @endif
                            @if($product->is_sale)
                            <div class="sale">sale</div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /New Arrival -->

<div class="clearfix"></div>

<!-- Featured Products -->
<section class="new-arrivals-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2><span>Sản phẩm</span> nổi bật</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="row">
                    @foreach($featuredProducts as $product)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wrapper">
                            <div class="pro-img">
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-responsive" />
                                @else
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/new-arrivals-img-1.jpg"
                                    alt="{{ $product->name }}" class="img-responsive" />
                                @endif
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">{{ $product->name }}</div>
                                <div class="price">
                                    @if($product->sale_price)
                                    <div class="new-price">{{ number_format($product->sale_price) }}đ</div>
                                    <div class="old-price"><del>{{ number_format($product->price) }}đ</del></div>
                                    @else
                                    <div class="new-price">{{ number_format($product->price) }}đ</div>
                                    @endif
                                </div>
                                <div class="btn-part">
                                    <a href="{{ route('products.show', $product->slug) }}" class="cart-btn">Xem chi
                                        tiết</a>
                                </div>
                            </div>
                            @if($product->is_featured)
                            <div class="new">nổi bật</div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Featured Products -->

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