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
                        <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                            <div class="sub-tit">Trái cây sạch, tươi ngon</div>
                            <h2><span>100%</span> Organic</h2>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="slide-body" data-group="slide">
                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/slider-banner.jpg" alt="banner">
                    <div class="carouseal-caption">
                        <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                            <div class="sub-tit">Chất lượng hàng đầu</div>
                            <h2><span>Tươi</span> Sạch</h2>
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
                                    @if($product->is_sale && $product->sale_price)
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
                                    @if($product->is_sale && $product->sale_price)
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
                            @if($product->is_sale && $product->sale_price)
                            <div class="sale">sale</div>
                            @endif
                            @if($product->is_featured)
                            <div class="new">Hot</div>
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

<div class="clearfix"></div>

<!-- Best Deal -->
<section class="fress-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 lpart">
                <div class="bg equal-height">
                    <h2 class="section-name"><span>Trái cây</span> tươi</h2>
                    <a href="{{ route('products.index') }}" class="shop-btn">Mua ngay</a>
                </div>
            </div>
            <div class="col-sm-4 rpart">
                <div class="bg equal-height">
                    <h3 class="free-shipping">Giao hàng miễn phí</h3>
                    <p>Đơn hàng trên 500.000đ</p>
                    <a href="{{ route('products.index') }}" class="shop-btn-1">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Best Deal -->

<div class="clearfix"></div>

<!-- Organic News -->
<section class="organic-news">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2><span>Tin tức</span> trái cây</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row no-gutter">
            @forelse($posts as $post)
            <div class="col-sm-3 col-xs-12">
                <div class="wrapper">
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-responsive" />
                    @else
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/organic-news-img-1.jpg" alt="{{ $post->title }}" class="img-responsive" />
                    @endif
                    <div class="overlay"></div>
                    <div class="text">
                        <div class="date">{{ $post->created_at->format('d/m/Y') }}</div>
                        <div class="title">
                            <a href="{{ route('blog.show', $post->slug) }}">
                                {{ \Illuminate\Support\Str::limit($post->title, 40) }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-sm-12 col-xs-12">
                <p class="text-center">Chưa có bài viết nào.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- /Organic News -->

<div class="clearfix"></div>

<!-- Delivery Process -->
<section class="delivery-process">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2><span>Quy trình</span> giao hàng</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 first">
                <div class="icon-part">
                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/step-1.png" alt="bước 1" class="img-responsive center-block" />
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="process-name">
                    <div class="step">Bước 01</div>
                    <p>Chọn một hoặc nhiều sản phẩm</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 second">
                <div class="icon-part">
                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/step-2.png" alt="bước 2" class="img-responsive center-block" />
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="process-name">
                    <div class="step">Bước 02</div>
                    <p>Xác nhận đơn hàng</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 third">
                <div class="icon-part">
                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/step-3.png" alt="bước 3" class="img-responsive center-block" />
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="process-name">
                    <div class="step">Bước 03</div>
                    <p>Nhập địa chỉ giao hàng</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 fourth">
                <div class="icon-part">
                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/step-4.png" alt="bước 4" class="img-responsive center-block" />
                    <i class="fas fa-shipping-fast"></i>
                </div>
                <div class="process-name">
                    <div class="step">Bước 04</div>
                    <p>Giao hàng nhanh chóng</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Delivery Process -->

<div class="clearfix"></div>

<!-- Newsletter -->
<section class="news-letter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="center">
                    <h3 class="news-tit"><span>Đăng ký</span> nhận tin</h3>
                    <p class="instruction">Đăng ký để nhận <span>tin mới nhất</span> và <span>ưu đãi</span>:</p>
                    <div class="form">
                        <form action="#" method="post">
                            @csrf
                            <input class="newsletter-input" type="email" name="email" placeholder="Nhập email của bạn" required>
                            <button type="submit" class="newsletter-btn">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Newsletter -->

<div class="clearfix"></div>

<!-- Services provide -->
<section class="helpline">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="bgreen">
                    <div class="inline">
                        <div class="box">
                            <div class="icon"> <i class="fas fa-truck"></i> </div>
                            <div class="text-part">
                                <h3>Giao hàng miễn phí</h3>
                                <p>Toàn quốc</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="fas fa-headset"></i> </div>
                            <div class="text-part">
                                <h3>Hỗ trợ 24/7</h3>
                                <p>Khách hàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="fas fa-exchange-alt"></i> </div>
                            <div class="text-part">
                                <h3>Đổi trả</h3>
                                <p>Dễ dàng</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="fas fa-phone"></i> </div>
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

@push('scripts')
<script>
$(document).ready(function() {
    // Reinitialize responsive slider if needed
    if (typeof $.fn.responsiveSlider !== 'undefined') {
        $('.responsive-slider').responsiveSlider({
            autoplay: true,
            speed: 800,
            timeout: 5000
        });
    }

    // Initialize new arrivals carousel
    if (typeof $.fn.owlCarousel !== 'undefined' && $('.new-arrivals-slider').length) {
        var itemCount = $('.new-arrivals-slider .item').length;
        $('.new-arrivals-slider').owlCarousel({
            loop: itemCount > 1, // Chỉ loop khi có nhiều hơn 1 item
            margin: 20,
            nav: true,
            dots: true,
            autoplay: itemCount > 1,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 1 },
                480: { items: 2 },
                768: { items: 3 },
                992: { items: 4 }
            }
        });
    }
});
</script>
@endpush