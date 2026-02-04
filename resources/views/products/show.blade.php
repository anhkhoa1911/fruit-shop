@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="clearfix"></div>

<!-- Banner -->
<section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img class="banner" src="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-page-banner.jpg" alt="banner" />
</section>
<!-- /Banner -->

<!-- Bredcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                <li><a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></li>
                <li>{{ $product->name }}</li>
            </ul>
            <h1 class="page-tit">{{ $product->name }}</h1>
        </div>
    </div>
</section>
<!-- /Bredcrumb -->

<!-- Content -->
<div class="content-part detail-page">
    <div class="container">
        <div class="row">
            <section class="single-post-section">

                <!-- product -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @php
                        $mainImg = $product->image ? asset('storage/' . $product->image) : 'https://www.ncodetechnologies.com/OrganicFoodStore/images/product-detail-img-1.jpg';
                        $galleryImages = $product->gallery && count($product->gallery) > 0
                            ? $product->gallery
                            : [];
                    @endphp
                    <div class="sp-wrap">
                        <a href="{{ $mainImg }}"><img src="{{ $mainImg }}" alt="{{ $product->name }}"></a>
                        @foreach($galleryImages as $gimg)
                            <a href="{{ asset('storage/' . $gimg) }}"><img src="{{ asset('storage/' . $gimg) }}" alt="{{ $product->name }}"></a>
                        @endforeach
                        @if(count($galleryImages) == 0)
                            <a href="{{ $mainImg }}"><img src="{{ $mainImg }}" alt="{{ $product->name }}"></a>
                            <a href="{{ $mainImg }}"><img src="{{ $mainImg }}" alt="{{ $product->name }}"></a>
                        @endif
                    </div>
                </div>
                <!-- /product -->
                <!-- product discription -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-single-meta">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <div class="ratting">
                            <ul>
                                <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/green-star-1.png" alt="star" class="img-responsive"></a></li>
                                <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/green-star-1.png" alt="star" class="img-responsive"></a></li>
                                <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/green-star-1.png" alt="star" class="img-responsive"></a></li>
                                <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/dark-star-1.png" alt="star" class="img-responsive"></a></li>
                                <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/dark-star-1.png" alt="star" class="img-responsive"></a></li>
                            </ul>
                            <span>( 0 đánh giá )</span>
                        </div>
                        <div class="price">
                            @if($product->sale_price)
                                <div class="new-price">{{ number_format($product->sale_price) }}đ</div>
                                <div class="old-price"><del>{{ number_format($product->price) }}đ</del></div>
                            @else
                                <div class="new-price">{{ number_format($product->price) }}đ</div>
                            @endif
                        </div>
                        <div class="availablity">
                            Tình trạng: <span>{{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}</span>
                        </div>
                        @if($product->description)
                            <p class="product-information">{{ $product->description }}</p>
                        @endif
                        <p class="product-information">Đơn vị: {{ $product->unit }}</p>
                        <div class="cart-process">
                            <div class="qty">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]"> - </button>
                                </span>
                                <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="1000">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]"> + </button>
                                </span>
                            </div>
                            <div class="cart">
                                <a href="{{ route('contact') }}?product={{ urlencode($product->name) }}" class="cart-btn">Liên hệ đặt hàng</a>
                            </div>
                            <div class="extra">
                                <ul class="list-inline">
                                    <li><a href="#"><i class="icon-favorite-heart-button"></i></a></li>
                                    <li><a href="#"><i class="icon-line-menu"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="tag-box">
                            <div class="tag-row">
                                <span class="tag-label sku">Mã SP</span><span class="dots">:</span><div class="tag-label-value sku-value">{{ $product->id }}</div>
                            </div>
                            <div class="tag-row">
                                <span class="tag-label category">Danh mục</span><span class="dots">:</span><div class="tag-label-value category-value"><a href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a></div>
                            </div>
                            <div class="tag-row">
                                <span class="tag-label">Tags</span><span class="dots">:</span><div class="tag-label-value"><a class="tag-btn" href="{{ route('products.category', $product->category->slug) }}">{{ $product->category->name }}</a> <a class="tag-btn" href="{{ route('products.index') }}">Trái cây</a></div>
                            </div>
                            <div class="tag-row">
                                <span class="tag-label">Chia sẻ</span><span class="dots">:</span>
                                <div class="tag-label-value">
                                    &nbsp;
                                    <ul class="social">
                                        <li><a href="#" target="_blank"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="icon-google-plus"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="icon-pinterest"></i></a></li>
                                        <li><a href="#" target="_blank"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /product discription -->

            </section>

            <!-- Tabbing -->
            <section class="tab-section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="responsive-tabs">
                                <h2>Mô tả</h2>
                                <div class="responsive-tabs__panel--active">
                                    @if($product->content)
                                        <div class="content">{!! $product->content !!}</div>
                                    @else
                                        <p>{{ $product->description ?: 'Sản phẩm trái cây tươi sạch, chất lượng.' }}</p>
                                    @endif
                                </div>
                                <h2>Đánh giá</h2>
                                <div>
                                    <form class="product-review-form row">
                                        <div class="col-sm-12 col-xs-12">
                                            <h3>Viết đánh giá</h3>
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label>Họ tên</label>
                                            <input type="text" class="form-control" required />
                                        </div>
                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" required />
                                        </div>
                                        <div class="form-group col-sm-12 col-xs-12">
                                            <label>Nội dung</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="col-sm-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /Tabbing -->

            <!-- Related Products -->
            @if($relatedProducts->count() > 0)
            <section class="related-products">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="tit">
                                <h2>Sản phẩm liên quan</h2>
                            </div>
                            <div class="owl-carousel owl-theme related-product-slider">
                                @foreach($relatedProducts as $related)
                                <div class="item">
                                    <div class="wrapper">
                                        <div class="pro-img">
                                            @if($related->image)
                                                <img class="img-responsive" src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}" />
                                            @else
                                                <img class="img-responsive" src="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-img-7.jpg" alt="{{ $related->name }}" />
                                            @endif
                                        </div>
                                        <div class="contain-wrapper">
                                            <div class="tit">{{ $related->name }}</div>
                                            <div class="price">
                                                @if($related->sale_price)
                                                    <div class="new-price">{{ number_format($related->sale_price) }}đ</div>
                                                    <div class="old-price"><del>{{ number_format($related->price) }}đ</del></div>
                                                @else
                                                    <div class="new-price">{{ number_format($related->price) }}đ</div>
                                                @endif
                                            </div>
                                            <div class="btn-part">
                                                <a href="{{ route('products.show', $related->slug) }}" class="cart-btn">Xem chi tiết</a>
                                                <i class="icon-basket-supermarket"></i>
                                            </div>
                                        </div>
                                        <div class="wrapper-box-hover">
                                            <div class="text">
                                                <ul>
                                                    <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    <li><a href="{{ route('products.show', $related->slug) }}"><i class="icon-view"></i></a></li>
                                                    <li><a href="{{ route('contact') }}?product={{ urlencode($related->name) }}"><i class="icon-basket-supermarket"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- /Related Products -->

        </div>
    </div>
</div>
<!-- /Content -->

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
                                <h3>Giao hàng tận nơi</h3>
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
                                <p>Trong 24h</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="icon-phone-call"></i> </div>
                            <div class="text-part">
                                <h3>Hotline</h3>
                                <p><a href="tel:{{ \App\Models\Setting::get('contact_phone', '0123456789') }}">{{ \App\Models\Setting::get('contact_phone', '0123456789') }}</a></p>
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
        // Smoothproducts gallery
        if ($('.sp-wrap').length && typeof $.fn.smoothproducts === 'function') {
            $('.sp-wrap').smoothproducts();
        }
        // Responsive tabs
        if ($('.responsive-tabs').length && typeof $.fn.responsiveTabs === 'function') {
            $('.responsive-tabs').responsiveTabs({ startCollapsed: 'accordion' });
        }
        // Related products carousel
        if ($('.related-product-slider').length && $('.related-product-slider .item').length && typeof $.fn.owlCarousel === 'function') {
            $('.related-product-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                responsive: {
                    0: { items: 1 },
                    480: { items: 2 },
                    768: { items: 3 },
                    992: { items: 4 }
                }
            });
        }
        // Quantity +/- buttons
        $('.btn-number').on('click', function(e) {
            e.preventDefault();
            var type = $(this).data('type');
            var input = $('input[name="' + $(this).data('field') + '"]');
            var val = parseInt(input.val(), 10) || 0;
            if (type === 'minus') val = Math.max(1, val - 1);
            if (type === 'plus') val += 1;
            input.val(val);
            input.closest('.qty').find('.btn-number[data-type="minus"]').prop('disabled', val <= 1);
        });
    });
</script>
@endpush
