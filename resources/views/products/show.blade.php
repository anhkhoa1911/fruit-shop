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
                    <div class="sp-wrap">
                        {{-- Hình chính luôn hiển thị đầu tiên --}}
                        @if($product->image)
                            <a href="{{ asset('storage/' . $product->image) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                            </a>
                        @endif
                        
                        {{-- Gallery images - render đơn giản không điều kiện phức tạp --}}
                        @foreach($product->gallery ?? [] as $galleryImage)
                            <a href="{{ asset('storage/' . $galleryImage) }}">
                                <img src="{{ asset('storage/' . $galleryImage) }}" alt="{{ $product->name }}">
                            </a>
                        @endforeach
                        
                        {{-- Fallback nếu không có hình nào --}}
                        @if(!$product->image && (!$product->gallery || count($product->gallery) == 0))
                            <a href="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-detail-img-1.jpg">
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-detail-img-1.jpg" alt="{{ $product->name }}">
                            </a>
                            <a href="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-detail-img-1.jpg">
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-detail-img-1.jpg" alt="{{ $product->name }}">
                            </a>
                        @endif
                    </div>
                </div>
                <!-- /product -->
                <!-- product discription -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-single-meta">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <h4 class="sku">Mã SP: {{ $product->id }}</h4>
                        @if($product->description)
                            <p class="product-information">
                                <strong>{{ $product->description }}</strong>
                                <br><br>
                                {!! $product->content !!}
                            </p>
                        @endif
                        <div class="cart-process">
                            <div class="cart">
                                <a href="#" class="cart-btn zalo-contact-btn"
                                   data-product-name="{{ $product->name }}"
                                   data-product-id="{{ $product->id }}">
                                    Liên hệ chúng tôi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /product discription -->
            </section>

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
                                            <div class="btn-part">
                                                <a href="{{ route('products.show', $related->slug) }}" class="cart-btn">Liên hệ chúng tôi</a>
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="wrapper-box-hover">
                                            <div class="text">
                                                <ul>
                                                    <li><a href="{{ route('products.show', $related->slug) }}"><i class="fas fa-eye"></i></a></li>
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
                            <div class="icon"> <i class="fas fa-truck"></i> </div>
                            <div class="text-part">
                                <h3>Giao hàng tận nơi</h3>
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
                                <p>Trong 24h</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"> <i class="fas fa-phone"></i> </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        var btn = document.querySelector('.zalo-contact-btn');
        if (!btn) return;

        btn.addEventListener('click', function (e) {
            e.preventDefault();

            var name = this.getAttribute('data-product-name') || '';
            var id = this.getAttribute('data-product-id') || '';
            var phone = '{{ \App\Models\Setting::get('contact_phone', '') }}';

            if (!phone) {
                return;
            }

            // Chuẩn hoá số điện thoại chỉ còn chữ số
            var normalizedPhone = phone.replace(/[^0-9]/g, '');

            var message = 'Chào shop, tôi muốn đặt hàng sản phẩm ' + name + ' (Mã SP: ' + id + ').';
            var encodedMessage = encodeURIComponent(message);

            // Link Zalo: mở chat với sẵn nội dung, trong tab/app mới
            var zaloUrl = 'https://zalo.me/' + normalizedPhone + '?text=' + encodedMessage;
            window.open(zaloUrl, '_blank');
        });
    });
</script>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        // Debug: kiểm tra số lượng ảnh trong gallery
        var imageCount = $('.sp-wrap a').length;
        console.log('=== GALLERY DEBUG ===');
        console.log('Total images in .sp-wrap:', imageCount);
        console.log('Image URLs:', $('.sp-wrap a').map(function() { return $(this).attr('href'); }).get());
        
        // Smoothproducts gallery - DISABLED for debugging
        // Check if images are duplicating
        console.log('Checking for duplicate images...');
        console.log('Number of .sp-wrap containers:', $('.sp-wrap').length);
        console.log('Number of images in first .sp-wrap:', $('.sp-wrap').first().find('a').length);
        
        // Temporarily disabled to check duplication issue
        /*
        if ($('.sp-wrap').length && typeof $.fn.smoothproducts === 'function') {
            $('.sp-wrap').smoothproducts();
            console.log('Smoothproducts initialized successfully');
        } else {
            console.warn('Smoothproducts plugin not available or .sp-wrap not found');
        }
        */
        // Responsive tabs
        if ($('.responsive-tabs').length && typeof $.fn.responsiveTabs === 'function') {
            $('.responsive-tabs').responsiveTabs({ startCollapsed: 'accordion' });
        }
        // Related products carousel
        if ($('.related-product-slider').length && $('.related-product-slider .item').length && typeof $.fn.owlCarousel === 'function') {
            var relatedItemCount = $('.related-product-slider .item').length;
            console.log('Related products count:', relatedItemCount);
            
            $('.related-product-slider').owlCarousel({
                loop: relatedItemCount > 1, // Chỉ loop khi có > 1 sản phẩm
                margin: 20,
                nav: true,
                dots: true,
                autoplay: relatedItemCount > 1,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: { items: 1 },
                    480: { items: Math.min(2, relatedItemCount) },
                    768: { items: Math.min(3, relatedItemCount) },
                    992: { items: Math.min(4, relatedItemCount) }
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
