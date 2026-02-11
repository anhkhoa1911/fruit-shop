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

    @php
        // Lấy danh sách chứng nhận (ưu tiên gallery mới, fallback về từng key cũ)
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
    @endphp

    @if(count($certificatesGallery))
    <section class="certificate-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="section-tit">
                        <div class="inner">
                            <h2 style="margin-bottom:15px;">Chứng nhận an toàn thực phẩm</h2>
                            <p style="margin-bottom:5px;">Những chứng nhận chất lượng và an toàn thực phẩm mà chúng tôi đã đạt được.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="certificate-scroller" style="display:flex;gap:20px;overflow-x:auto;padding-bottom:10px;justify-content:center;">
                                @foreach($certificatesGallery as $path)
                                    @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                    <div class="flex-shrink-0" style="min-width:200px;">
                                        @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                            <a href="{{ asset('storage/' . $path) }}" style="display:block;cursor:pointer;" target="_blank">
                                                <img src="{{ asset('storage/' . $path) }}" alt="certificate" class="img-responsive center-block" style="max-height:260px;object-fit:contain;border-radius:0;transition:transform 0.3s ease;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'" />
                                            </a>
                                        @else
                                            <div style="position:relative;display:block;cursor:pointer;">
                                                <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                                    style="width:220px;height:340px;border:none;display:block;pointer-events:none;" 
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
            </div>
        </div>
    </section>
    @endif

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

    @if(count($factoryGallery))
    <section class="factory-section" style="padding:60px 0;background:#f9f9f9;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="section-tit">
                        <div class="inner">
                            <h2 style="margin-bottom:15px;">Nhà máy & Quy trình</h2>
                            <p style="margin-bottom:5px;">Hệ thống nhà máy được trang bị hiện đại, đáp ứng các tiêu chuẩn an toàn thực phẩm để đảm bảo trái cây luôn tươi ngon và an toàn.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <div class="factory-gallery" style="display:flex;gap:20px;overflow-x:auto;padding:20px 0;justify-content:center;">
                                @foreach($factoryGallery as $path)
                                    @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                    <div class="flex-shrink-0" style="min-width:280px;max-width:280px;">
                                        @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                            <a href="{{ asset('storage/' . $path) }}" data-fancybox="factory-gallery" data-caption="{{ basename($path) }}" style="display:block;cursor:pointer;">
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
                                                    <a href="{{ asset('storage/' . $path) }}" target="_blank" style="color:#1976d2;text-decoration:underline;font-size:11px;font-weight:bold;">
                                                        {{ basename($path) }}
                                                    </a>
                                                    <p style="margin:4px 0 0 0;font-size:10px;color:#666;">Click để mở PDF đầy đủ</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(count($farmGuavaGallery) || count($farmSoriGallery))
    <section class="farm-section" style="padding:60px 0;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="section-tit">
                        <div class="inner">
                            <h2 style="margin-bottom:15px;">Trang trại đối tác</h2>
                            <p style="margin-bottom:5px;">Trái cây tươi ngon được thu hoạch trực tiếp từ các trang trại đối tác uy tín, đảm bảo chất lượng và nguồn gốc rõ ràng.</p>
                        </div>
                    </div>
                    <div class="row">
                        @if(count($farmGuavaGallery))
                        <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom:30px;">
                            <div style="background:#fff;border-radius:8px;padding:25px;box-shadow:0 2px 10px rgba(0,0,0,0.08);height:100%;">
                                <div class="sec-tit" style="margin-bottom:15px;">
                                    <h3 style="font-size:22px;color:#333;margin-bottom:10px;">
                                        <span style="color:#8bc34a;">Trang trại ổi</span>
                                    </h3>
                                    <p style="color:#666;font-size:14px;line-height:1.6;">Trái ổi tươi ngon được thu hoạch trực tiếp từ trang trại đối tác, đảm bảo chất lượng và nguồn gốc rõ ràng.</p>
                                </div>
                                <div class="farm-gallery" style="display:flex;gap:15px;overflow-x:auto;padding-top:15px;">
                                    @foreach($farmGuavaGallery as $path)
                                        @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                        <div class="flex-shrink-0" style="min-width:200px;max-width:200px;">
                                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                                <a href="{{ asset('storage/' . $path) }}" data-fancybox="farm-guava-gallery" data-caption="{{ basename($path) }}" style="display:block;cursor:pointer;">
                                                    <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#fff;transition:transform 0.3s ease,box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 4px 10px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)'">
                                                        <img src="{{ asset('storage/' . $path) }}" alt="Trang trại ổi" class="img-responsive" style="width:100%;height:180px;object-fit:cover;display:block;">
                                                    </div>
                                                </a>
                                            @else
                                                <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#fff;">
                                                    <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                                        style="width:100%;height:180px;border:none;display:block;" 
                                                        title="{{ basename($path) }}">
                                                    </iframe>
                                                    <div style="padding:8px;text-align:center;background:#fff;border-top:1px solid #eee;">
                                                        <a href="{{ asset('storage/' . $path) }}" target="_blank" style="color:#1976d2;text-decoration:underline;font-size:10px;font-weight:bold;">
                                                            {{ basename($path) }}
                                                        </a>
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
                        <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom:30px;">
                            <div style="background:#fff;border-radius:8px;padding:25px;box-shadow:0 2px 10px rgba(0,0,0,0.08);height:100%;">
                                <div class="sec-tit" style="margin-bottom:15px;">
                                    <h3 style="font-size:22px;color:#333;margin-bottom:10px;">
                                        <span style="color:#e91e63;">Trang trại sơ ri</span>
                                    </h3>
                                    <p style="color:#666;font-size:14px;line-height:1.6;">Trang trại sơ ri với quy trình canh tác an toàn, mang đến những trái sơ ri chín mọng, giàu dinh dưỡng.</p>
                                </div>
                                <div class="farm-gallery" style="display:flex;gap:15px;overflow-x:auto;padding-top:15px;">
                                    @foreach($farmSoriGallery as $path)
                                        @php $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); @endphp
                                        <div class="flex-shrink-0" style="min-width:200px;max-width:200px;">
                                            @if(in_array($ext, ['jpg','jpeg','png','gif','webp']))
                                                <a href="{{ asset('storage/' . $path) }}" data-fancybox="farm-sori-gallery" data-caption="{{ basename($path) }}" style="display:block;cursor:pointer;">
                                                    <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#fff;transition:transform 0.3s ease,box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 4px 10px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 2px 6px rgba(0,0,0,0.1)'">
                                                        <img src="{{ asset('storage/' . $path) }}" alt="Trang trại sơ ri" class="img-responsive" style="width:100%;height:180px;object-fit:cover;display:block;">
                                                    </div>
                                                </a>
                                            @else
                                                <div style="border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#fff;">
                                                    <iframe src="{{ asset('storage/' . $path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                                        style="width:100%;height:180px;border:none;display:block;" 
                                                        title="{{ basename($path) }}">
                                                    </iframe>
                                                    <div style="padding:8px;text-align:center;background:#fff;border-top:1px solid #eee;">
                                                        <a href="{{ asset('storage/' . $path) }}" target="_blank" style="color:#1976d2;text-decoration:underline;font-size:10px;font-weight:bold;">
                                                            {{ basename($path) }}
                                                        </a>
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

    // Khởi tạo Fancybox cho các gallery
    if (typeof $.fancybox !== 'undefined') {
        $('[data-fancybox]').fancybox({
            buttons: [
                'zoom',
                'share',
                'slideShow',
                'fullScreen',
                'download',
                'thumbs',
                'close'
            ],
            loop: true,
            protect: true,
            transitionEffect: 'fade',
            transitionDuration: 300,
            image: {
                zoomDuration: 300
            },
            thumbs: {
                autoStart: false
            },
            wheel: 'auto',
            touch: {
                vertical: true,
                momentum: true
            }
        });
    }
});
</script>
@endpush
@endsection
