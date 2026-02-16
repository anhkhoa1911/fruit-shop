@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="clearfix"></div>

<!-- Banner Carousel -->
<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true" data-interval="5000">
    <div class="slides" data-group="slides">
        <ul>
            <li>
                <div class="slide-body" data-group="slide">
                    <img src="{{ asset('images/slider-banner.jpg') }}" alt="banner">
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
                    <img src="{{ asset('images/slider-banner.jpg') }}" alt="banner">
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
{{-- <section class="fress-entry-section">
    <div class="pos-absolute">
        <div class="container">
            <div class="row">
                @foreach($categories->take(3) as $category)
                <div class="col-sm-4 col-xs-12">
                    @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                        class="img-responsive" />
                    @else
                    <img src="{{ asset('images/fresh-fruits-img.jpg') }}"
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
</section> --}}
<!-- /Fresh Collection -->

@php
    $companyIntroShort = \App\Models\Setting::get('company_intro_short', '');
@endphp
@if($companyIntroShort !== '')
<section class="section-padding company-intro-block" style="background:linear-gradient(180deg, #fafafa 0%, #fff 100%);padding-top:2.5rem;padding-bottom:2.5rem;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 text-center">
                <p class="company-intro-short" style="font-family:'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;max-width:780px;margin:0 auto;font-size:20px;font-weight:500;line-height:1;color:#2c3e50;letter-spacing:0.03em;text-align:center;">{!! nl2br(e($companyIntroShort)) !!}</p>
            </div>
        </div>
    </div>
</section>
@endif

@php
    $certificatesGallery = json_decode(\App\Models\Setting::get('certificates_gallery', '[]'), true) ?: [];
    if (empty($certificatesGallery)) {
        foreach (['certificate_1_image', 'certificate_2_image', 'certificate_3_image'] as $legacyKey) {
            $v = \App\Models\Setting::get($legacyKey);
            if ($v) {
                $certificatesGallery[] = $v;
            }
        }
    }
    $factoryGallery = json_decode(\App\Models\Setting::get('factory_gallery', '[]'), true) ?: [];
    $farmGuavaGallery = json_decode(\App\Models\Setting::get('farm_guava_gallery', '[]'), true) ?: [];
    $farmSoriGallery = json_decode(\App\Models\Setting::get('farm_sori_gallery', '[]'), true) ?: [];
    $factoryDescription = \App\Models\Setting::get('factory_description', 'Hệ thống nhà máy được trang bị hiện đại, đáp ứng các tiêu chuẩn an toàn thực phẩm để đảm bảo trái cây luôn tươi ngon và an toàn.');
    $farmDescription = \App\Models\Setting::get('farm_description', 'Trái cây tươi ngon được thu hoạch trực tiếp từ các trang trại đối tác uy tín, đảm bảo chất lượng và nguồn gốc rõ ràng.');
    $applicationSolutionDescription = \App\Models\Setting::get('application_solution_description', '');
    $applicationSolutionGallery = json_decode(\App\Models\Setting::get('application_solution_gallery', '[]'), true) ?: [];
@endphp

@if(count($factoryGallery))
<section class="factory-section section-padding" style="background:#f9f9f9;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2 style="margin-bottom:15px;"><span>Nhà máy</span> & Quy trình</h2>
                        <h4 style="margin-bottom:20px;">{!! nl2br(e($factoryDescription)) !!}</h4>
                    </div>
                </div>
                <div class="factory-gallery" style="display:flex;gap:20px;overflow-x:auto;padding:10px 0 20px;justify-content:center;">
                    @foreach($factoryGallery as $path)
                        @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                        <div class="flex-shrink-0" style="min-width:280px;max-width:280px;">
                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                <a href="{{ asset('storage/' . $path) }}" data-fancybox="factory-gallery-home" data-caption="{{ basename($path) }}" style="display:block;cursor:pointer;">
                                    <div style="border-radius:8px;overflow:hidden;box-shadow:0 4px 8px rgba(0,0,0,0.1);background:#fff;transition:transform 0.3s ease,box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 6px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 8px rgba(0,0,0,0.1)'">
                                        <img src="{{ asset('storage/' . $path) }}" alt="Nhà máy" class="img-responsive" style="width:100%;height:220px;object-fit:cover;display:block;">
                                    </div>
                                </a>
                            @else
                                <div style="border-radius:8px;overflow:hidden;box-shadow:0 4px 8px rgba(0,0,0,0.1);background:#fff;">
                                    <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0"
                                        style="width:100%;height:220px;border:none;display:block;"
                                        title="{{ basename($path) }}">
                                    </iframe>
                                    <div style="padding:10px;text-align:center;background:#fff;border-top:1px solid #eee;">
                                        <a href="{{ asset('storage/' . $path) }}" target="_blank" style="color:#1976d2;text-decoration:underline;font-size:11px;font-weight:bold;">{{ basename($path) }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(count($farmGuavaGallery) || count($farmSoriGallery))
<section class="farm-section section-padding" style="background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2 style="margin-bottom:15px;"><span>Trang trại</span> đối tác</h2>
                        <h4 style="margin-bottom:20px;">{!! nl2br(e($farmDescription)) !!}</h4>
                    </div>
                </div>
                <div class="row">
                    @if(count($farmGuavaGallery))
                    <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom:25px;">
                        <div style="background:#fff;border-radius:8px;padding:20px;box-shadow:0 2px 10px rgba(0,0,0,0.08);height:100%;border:1px solid #eee;">
                            <h3 style="font-size:20px;color:#333;margin-bottom:10px;"><span style="color:#8bc34a;">Trang trại ổi</span></h3>
                            <p style="color:#666;font-size:14px;line-height:1.5;margin-bottom:15px;">Trái ổi tươi ngon được thu hoạch trực tiếp từ trang trại đối tác, đảm bảo chất lượng và nguồn gốc rõ ràng.</p>
                            <div class="farm-gallery" style="display:flex;gap:15px;overflow-x:auto;padding-top:5px;">
                                @foreach($farmGuavaGallery as $path)
                                    @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                    <div class="flex-shrink-0" style="min-width:200px;max-width:200px;">
                                        @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                            <a href="{{ asset('storage/' . $path) }}" data-fancybox="farm-guava-home" data-caption="{{ basename($path) }}" style="display:block;cursor:pointer;">
                                                <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);transition:transform 0.3s ease,box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 4px 10px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)'">
                                                    <img src="{{ asset('storage/' . $path) }}" alt="Trang trại ổi" class="img-responsive" style="width:100%;height:180px;object-fit:cover;display:block;">
                                                </div>
                                            </a>
                                        @else
                                            <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#fff;">
                                                <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" style="width:100%;height:180px;border:none;display:block;" title="{{ basename($path) }}"></iframe>
                                                <div style="padding:8px;text-align:center;border-top:1px solid #eee;">
                                                    <a href="{{ asset('storage/' . $path) }}" target="_blank" style="color:#1976d2;text-decoration:underline;font-size:10px;font-weight:bold;">{{ basename($path) }}</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(count($farmSoriGallery))
                    <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom:25px;">
                        <div style="background:#fff;border-radius:8px;padding:20px;box-shadow:0 2px 10px rgba(0,0,0,0.08);height:100%;border:1px solid #eee;">
                            <h3 style="font-size:20px;color:#333;margin-bottom:10px;"><span style="color:#e91e63;">Trang trại sơ ri</span></h3>
                            <p style="color:#666;font-size:14px;line-height:1.5;margin-bottom:15px;">Trang trại sơ ri với quy trình canh tác an toàn, mang đến những trái sơ ri chín mọng, giàu dinh dưỡng.</p>
                            <div class="farm-gallery" style="display:flex;gap:15px;overflow-x:auto;padding-top:5px;">
                                @foreach($farmSoriGallery as $path)
                                    @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                    <div class="flex-shrink-0" style="min-width:200px;max-width:200px;">
                                        @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                            <a href="{{ asset('storage/' . $path) }}" data-fancybox="farm-sori-home" data-caption="{{ basename($path) }}" style="display:block;cursor:pointer;">
                                                <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);transition:transform 0.3s ease,box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 4px 10px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)'">
                                                    <img src="{{ asset('storage/' . $path) }}" alt="Trang trại sơ ri" class="img-responsive" style="width:100%;height:180px;object-fit:cover;display:block;">
                                                </div>
                                            </a>
                                        @else
                                            <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#fff;">
                                                <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" style="width:100%;height:180px;border:none;display:block;" title="{{ basename($path) }}"></iframe>
                                                <div style="padding:8px;text-align:center;border-top:1px solid #eee;">
                                                    <a href="{{ asset('storage/' . $path) }}" target="_blank" style="color:#1976d2;text-decoration:underline;font-size:10px;font-weight:bold;">{{ basename($path) }}</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(count($certificatesGallery))
<section class="certificate-section section-padding" style="background:#f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2 style="margin-bottom:15px;line-height:80px;"><span>Chứng nhận</span> an toàn thực phẩm</h2>
                        <h4 style="margin-bottom:15px;line-height:20px;">Những chứng nhận chất lượng và an toàn thực phẩm mà chúng tôi đã đạt được.</h4>
                    </div>
                </div>
                <div class="certificate-scroller" style="display:flex;gap:20px;overflow-x:auto;padding-bottom:10px;justify-content:center;flex-wrap:nowrap;">
                    @foreach($certificatesGallery as $path)
                        @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                        <div class="flex-shrink-0" style="min-width:200px;">
                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                <a href="{{ asset('storage/' . $path) }}" style="display:block;cursor:pointer;" target="_blank">
                                    <img src="{{ asset('storage/' . $path) }}" alt="Chứng nhận" class="img-responsive center-block" style="max-height:220px;object-fit:contain;border-radius:4px;box-shadow:0 2px 12px rgba(0,0,0,0.08);transition:transform 0.3s ease;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'" />
                                </a>
                            @else
                                <div style="position:relative;display:block;cursor:pointer;">
                                    <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0"
                                        style="width:220px;height:300px;border:none;display:block;pointer-events:none;border-radius:4px;box-shadow:0 2px 12px rgba(0,0,0,0.08);"
                                        title="{{ basename($path) }}">
                                    </iframe>
                                    <a href="{{ asset('storage/' . $path) }}" target="_blank" rel="noopener noreferrer" style="position:absolute;top:0;left:0;width:100%;height:100%;display:block;z-index:10;cursor:pointer;" title="Click để xem PDF đầy đủ"></a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<div class="clearfix"></div>

<!-- Trái cây tươi -->
<section class="new-arrivals-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2><span>Trái cây tươi</span></h2>
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
                                <img src="{{ asset('images/new-arrivals-img-1.jpg') }}"
                                    alt="{{ $product->name }}" class="img-responsive" />
                                @endif
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">{{ $product->name }}</div>
                                <div class="btn-part">
                                    <a href="{{ route('products.show', $product->slug) }}" class="cart-btn">Liên hệ chúng tôi</a>
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
<!-- /Trái cây tươi -->

<div class="clearfix"></div>

<!-- Ứng dụng và giải pháp sản phẩm -->
<section class="new-arrivals-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="section-tit">
                    <div class="inner">
                        <h2 style="line-height:80px;"><span>Ứng dụng & giải pháp sản phẩm</span></h2>
                        @if($applicationSolutionDescription)
                        <h4 style="margin-bottom:20px;">{!! nl2br(e($applicationSolutionDescription)) !!}</h4>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                @if(count($applicationSolutionGallery))
                <div class="row application-solution-gallery" style="padding:10px 0 20px;">
                    @foreach($applicationSolutionGallery as $path)
                        @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                        <div class="col-md-3 col-sm-6 col-xs-4" style="margin-bottom:20px;">
                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                <a href="{{ asset('storage/' . $path) }}" data-fancybox="application-solution-gallery" data-caption="{{ basename($path) }}" style="display:block;cursor:pointer;">
                                    <div style="border-radius:8px;overflow:hidden;box-shadow:0 4px 8px rgba(0,0,0,0.1);background:#fff;transition:transform 0.3s ease,box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 6px 12px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 8px rgba(0,0,0,0.1)'">
                                        <img src="{{ asset('storage/' . $path) }}" alt="Ứng dụng & giải pháp" class="img-responsive" style="width:100%;height:220px;object-fit:cover;display:block;">
                                    </div>
                                </a>
                            @else
                                <div style="border-radius:8px;overflow:hidden;box-shadow:0 4px 8px rgba(0,0,0,0.1);background:#fff;">
                                    <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" style="width:100%;height:280px;border:none;display:block;" title="{{ basename($path) }}"></iframe>
                                    <div style="padding:8px;text-align:center;background:#f5f5f5;border-top:1px solid #eee;">
                                        <a href="{{ asset('storage/' . $path) }}" target="_blank" rel="noopener" class="text-sm" style="color:#549843;">Xem file</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                @else
                <p class="text-center" style="color:#666;">Chưa có hình ảnh. Vui lòng upload tại Admin → Cài đặt → Ứng dụng & giải pháp.</p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- /Ứng dụng và giải pháp sản phẩm -->

<div class="clearfix"></div>

<div class="clearfix"></div>

<!-- Best Deal -->
<section class="fress-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 lpart">
                <div class="bg equal-height">
                    <h2 class="section-name"><span>Trái cây</span> tươi</h2>
                    <a href="{{ route('products.index') }}" class="shop-btn">Liên hệ chúng tôi</a>
                </div>
            </div>
            <div class="col-sm-4 rpart">
                <div class="bg equal-height">
                    <h3 class="free-shipping" style="line-height:50px;">Ứng dụng & giải pháp sản phẩm</h3>
                    <br>
                    <a href="{{ route('products.index') }}" class="shop-btn-1">Liên hệ chúng tôi</a>
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
            <div class="col-sm-3 col-xs-6">
                <div class="wrapper">
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-responsive" />
                    @else
                        <img src="{{ asset('images/organic-news-img-1.jpg') }}" alt="{{ $post->title }}" class="img-responsive" />
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
                    <img src="{{ asset('images/step-1.png') }}" alt="bước 1" class="img-responsive center-block" />
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="process-name">
                    <div class="step">Bước 01</div>
                    <p>Chọn một hoặc nhiều sản phẩm</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 second">
                <div class="icon-part">
                    <img src="{{ asset('images/step-2.png') }}" alt="bước 2" class="img-responsive center-block" />
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="process-name">
                    <div class="step">Bước 02</div>
                    <p>Xác nhận đơn hàng</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 third">
                <div class="icon-part">
                    <img src="{{ asset('images/step-3.png') }}" alt="bước 3" class="img-responsive center-block" />
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="process-name">
                    <div class="step">Bước 03</div>
                    <p>Nhập địa chỉ giao hàng</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 fourth">
                <div class="icon-part">
                    <img src="{{ asset('images/step-4.png') }}" alt="bước 4" class="img-responsive center-block" />
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
{{-- <section class="news-letter">
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
</section> --}}
<!-- /Newsletter -->

<div class="clearfix"></div>

<!-- Services provide -->
{{-- <section class="helpline">
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
</section> --}}
<!-- /Services provide -->
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize new arrivals carousel
    if (typeof $.fn.owlCarousel !== 'undefined' && $('.new-arrivals-slider').length) {
        var itemCount = $('.new-arrivals-slider .item').length;
        $('.new-arrivals-slider').owlCarousel({
            loop: itemCount > 1, // Chỉ loop khi có nhiều hơn 1 item
            margin: 20,
            nav: true,
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
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