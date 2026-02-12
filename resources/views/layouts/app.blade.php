<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Cửa hàng trái cây sạch, tươi ngon')">
    <title>@yield('title', 'Trang chủ') - Cửa hàng trái cây</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://www.ncodetechnologies.com/OrganicFoodStore/images/logo.png">
    <link rel="shortcut icon" type="image/png" href="https://www.ncodetechnologies.com/OrganicFoodStore/images/logo.png">
    <link rel="apple-touch-icon" href="https://www.ncodetechnologies.com/OrganicFoodStore/images/logo.png">

    <!-- Bootstrap v3.3.7 Style -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Icons Style -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/fontello.css" rel="stylesheet" />
    <!-- Carousel Style -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/responsive-slider.css" rel="stylesheet" />
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/owl.carousel.min.css" rel="stylesheet">
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/owl.theme.default.min.css" rel="stylesheet">
    <!-- Value Slider Style (for About page) -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- Smooth Product Style (for Product detail) -->
    <link rel="stylesheet" href="https://www.ncodetechnologies.com/OrganicFoodStore/css/smoothproducts.css">
    <!-- Responsive Tab Style (for Product detail) -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/responsive-tabs.css" rel="stylesheet">
    <!-- Gallery with tab Style (for Product detail) -->
    <link rel="stylesheet" href="https://www.ncodetechnologies.com/OrganicFoodStore/css/jquery.fancybox.min.css">
    <!-- Custom Style -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/style.css" rel="stylesheet" />
    <!-- Custom Responsive Style -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/query.css" rel="stylesheet" />
    <!-- Google Font Style -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- Font Awesome (footer social icons - reliable CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fix: Load fontello font with absolute URLs so icons display on any domain -->
    <style>
        @font-face {
            font-family: 'fontello';
            src: url('https://www.ncodetechnologies.com/OrganicFoodStore/fonts/fontello.eot?68475362');
            src: url('https://www.ncodetechnologies.com/OrganicFoodStore/fonts/fontello.eot?68475362#iefix') format('embedded-opentype'),
                 url('https://www.ncodetechnologies.com/OrganicFoodStore/fonts/fontello.woff2?68475362') format('woff2'),
                 url('https://www.ncodetechnologies.com/OrganicFoodStore/fonts/fontello.woff?68475362') format('woff'),
                 url('https://www.ncodetechnologies.com/OrganicFoodStore/fonts/fontello.ttf?68475362') format('truetype'),
                 url('https://www.ncodetechnologies.com/OrganicFoodStore/fonts/fontello.svg?68475362#fontello') format('svg');
            font-weight: normal;
            font-style: normal;
        }
        /* Footer responsive */
        @media (max-width: 767px) {
            footer .top-footer .logo-btm .adress,
            footer .top-footer .logo-btm .phone,
            footer .top-footer .logo-btm .mail { display: flex; align-items: flex-start; gap: 8px; }
            footer .top-footer .logo-btm .adress i,
            footer .top-footer .logo-btm .phone i,
            footer .top-footer .logo-btm .mail i { flex-shrink: 0; margin-top: 2px; }
            footer .insta-img-box { display: flex; flex-wrap: wrap; gap: 4px; }
            footer .insta-img-box img { width: calc(33.333% - 4px); height: auto; }
        }

        /* Fix responsive slider display issues */
        .responsive-slider {
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .responsive-slider .slides {
            position: relative;
            width: 100%;
        }
        .responsive-slider .slides ul {
            list-style: none;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .responsive-slider .slides ul li {
            width: 100%;
            position: relative;
        }
        .responsive-slider .slides ul li .slide-body {
            width: 100%;
            position: relative;
            display: block;
        }
        .responsive-slider .slides ul li .slide-body img {
            width: 100%;
            height: auto;
            display: block;
        }
        /* Banner caption text styling */
        .responsive-slider .carouseal-caption {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 10;
            pointer-events: none;
        }
        .responsive-slider .carouseal-caption .caption.header {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #333;
            width: 80%;
        }
        .responsive-slider .carouseal-caption .caption.header .sub-tit {
            font-size: 28px;
            font-weight: 300;
            margin-bottom: 15px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .responsive-slider .carouseal-caption .caption.header h2 {
            font-size: 72px;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .responsive-slider .carouseal-caption .caption.header h2 span {
            color: #8bc34a;
        }
        .responsive-slider .carouseal-caption .caption.sub {
            position: absolute;
            bottom: 35%;
            left: 50%;
            transform: translateX(-50%);
            font-weight: 600;
            font-size: 18px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            white-space: nowrap;
        }
        @media (max-width: 768px) {
            .responsive-slider .carouseal-caption .caption.header h2 {
                font-size: 36px;
            }
            .responsive-slider .carouseal-caption .caption.header .sub-tit {
                font-size: 18px;
            }
            .responsive-slider .carouseal-caption .caption.sub {
                font-size: 14px;
                bottom: 30%;
            }
        }

        /* Header alignment fixes */
        header .bottom-header .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header .bottom-header .navbar .nav-header {
            flex: 0 0 auto;
        }
        header .bottom-header .navbar .collapse {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        header .bottom-header .navbar .collapse .nav {
            margin: 0;
        }
        
        /* Dropdown menu styling with smooth animation */
        .navbar-nav > li.dropdown {
            position: relative;
        }
        .navbar-nav > li.dropdown .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            border-radius: 4px;
            padding: 10px 0;
            margin: 0;
            list-style: none;
            z-index: 1000;
            /* Animation properties */
            display: block;
            opacity: 0;
            pointer-events: none;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .navbar-nav > li.dropdown:hover .dropdown-menu {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }
        .navbar-nav > li.dropdown .dropdown-menu li {
            padding: 0;
            margin: 0;
        }
        .navbar-nav > li.dropdown .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        .navbar-nav > li.dropdown .dropdown-menu li a:hover {
            background: #f8f9fa;
            color: #8bc34a;
            border-left-color: #8bc34a;
            padding-left: 23px;
        }
        .navbar-nav > li.dropdown > a .fa-angle-down {
            font-size: 12px;
            margin-left: 4px;
            transition: transform 0.3s ease;
        }
        .navbar-nav > li.dropdown:hover > a .fa-angle-down {
            transform: rotate(180deg);
        }

        /* Fresh Collection Section - Auto center based on item count */
        .fress-entry-section .row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .fress-entry-section .col-sm-4 {
            max-width: 370px;
        }
        .fress-entry-section img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
        }
        .fress-entry-section .tit-btn-wrapper {
            text-align: center;
            padding: 15px 10px;
        }
        .fress-entry-section .tit-btn-wrapper .tit {
            font-size: 26px;
            font-weight: 600;
            margin: 0 0 12px 0;
            line-height: 1.3;
            color: #333;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .fress-entry-section .tit-btn-wrapper .tit span {
            color: #8bc34a;
        }
        @media (max-width: 768px) {
            .fress-entry-section .tit-btn-wrapper .tit {
                font-size: 20px;
                white-space: normal;
            }
        }

        /* Fix social icons trong team members section (About page) */
        .our-farmers-section .social li a,
        .our-farmer .social li a,
        .our-farmers-section .contain-wrapper .social li a,
        section.our-farmers-section ul.social li a {
            display: flex !important;
            align-items: center;
            justify-content: center;
            width: 40px !important;
            height: 40px !important;
            border-radius: 50% !important;
            background-color: #fff !important;
            border: 2px solid #8bc34a !important;
            transition: all 0.3s ease;
        }
        
        .our-farmers-section .social li a::before,
        .our-farmer .social li a::before {
            display: none !important;
        }
        
        .our-farmers-section .social li a i,
        .our-farmer .social li a i,
        .our-farmers-section .contain-wrapper .social li a i,
        section.our-farmers-section ul.social li a i,
        .our-farmers-section .social li a .fab,
        .our-farmer .social li a .fab {
            font-size: 16px !important;
            line-height: 1 !important;
            color: #8bc34a !important;
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
        
        .our-farmers-section .social li a:hover,
        .our-farmer .social li a:hover,
        .our-farmers-section .contain-wrapper .social li a:hover,
        section.our-farmers-section ul.social li a:hover {
            background-color: #8bc34a !important;
        }
        
        .our-farmers-section .social li a:hover i,
        .our-farmer .social li a:hover i,
        .our-farmers-section .contain-wrapper .social li a:hover i,
        section.our-farmers-section ul.social li a:hover i,
        .our-farmers-section .social li a:hover .fab,
        .our-farmer .social li a:hover .fab {
            color: #fff !important;
        }
        
        /* Đảm bảo social list hiển thị đúng */
        .our-farmers-section .social,
        .our-farmer .social {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 15px;
            padding: 0;
            list-style: none;
        }
        
        .our-farmers-section .social li,
        .our-farmer .social li {
            margin: 0;
        }

        /* Fix helpline section - all boxes on one row */
        section.helpline .bgreen .inline {
            display: flex !important;
            flex-wrap: nowrap !important;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }
        
        section.helpline .bgreen .inline .box {
            flex: 1;
            min-width: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        section.helpline .bgreen .inline .box .icon {
            flex-shrink: 0;
            width: 50px;
            height: 50px;
        }
        
        section.helpline .bgreen .inline .box .icon i {
            font-size: 24px;
        }
        
        section.helpline .bgreen .inline .box .text-part {
            flex: 1;
            min-width: 0;
            overflow: hidden;
        }
        
        section.helpline .bgreen .inline .box .text-part h3 {
            font-size: 16px !important;
            line-height: 1.3;
            margin-bottom: 3px !important;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        section.helpline .bgreen .inline .box .text-part p {
            font-size: 13px;
            margin: 0;
            white-space: nowrap;
        }
        
        @media (max-width: 1200px) {
            section.helpline .bgreen .inline {
                gap: 15px;
            }
            section.helpline .bgreen .inline .box {
                gap: 10px;
            }
            section.helpline .bgreen .inline .box .text-part h3 {
                font-size: 14px !important;
            }
            section.helpline .bgreen .inline .box .text-part p {
                font-size: 12px;
            }
        }
        
        @media (max-width: 991px) {
            section.helpline .bgreen .inline {
                gap: 12px;
            }
            section.helpline .bgreen .inline .box {
                gap: 8px;
            }
            section.helpline .bgreen .inline .box .icon {
                width: 40px;
                height: 40px;
            }
            section.helpline .bgreen .inline .box .icon i {
                font-size: 20px;
            }
            section.helpline .bgreen .inline .box .text-part h3 {
                font-size: 13px !important;
            }
            section.helpline .bgreen .inline .box .text-part p {
                font-size: 11px;
            }
        }
        
        @media (max-width: 767px) {
            section.helpline .bgreen .inline {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            section.helpline .bgreen .inline .box {
                min-width: 200px;
            }
        }
    </style>
</head>

<body>
    <!-- Loader -->
    <div id="loading">
        <div class="loader">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <!-- Header -->
    <header>
        <div class="bottom-header">
            <div class="container">
                <nav class="navbar">
                    <div class="nav-header">
                        <button type="button" class="navbar-toggle"> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <div class="logo"><a href="{{ route('home') }}"><img
                                    src="https://www.ncodetechnologies.com/OrganicFoodStore/images/logo.png"
                                    alt="logo" /></a></div>
                    </div>
                    <div class="collapse" id="organic-food-navigation">
                        <div class="remove"><i class="fas fa-times"></i></div>
                        <div class="menu-logo"><a href="{{ route('home') }}"><img
                                    src="https://www.ncodetechnologies.com/OrganicFoodStore/images/logo.png"
                                    alt="logo" /></a></div>
                        <ul class="nav navbar-nav">
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}">Giới thiệu</a>
                            </li>
                            <li class="dropdown {{ request()->routeIs('products.*') ? 'active' : '' }}">
                                <a href="{{ route('products.index') }}" class="dropdown-toggle">
                                    Sản phẩm <i class="fas fa-angle-down"></i>
                                </a>
                                @if(isset($headerCategories) && $headerCategories->count())
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('products.index') }}">Tất cả sản phẩm</a></li>
                                    @foreach($headerCategories as $cat)
                                    <li><a href="{{ route('products.category', $cat->slug) }}">{{ $cat->name }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                <a href="{{ route('contact') }}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="searchbox">
                    <div class="inner">
                        <div class="container-1">
                            <form action="{{ route('products.index') }}" method="GET">
                                <div class="pos-rel">
                                    <input class="input-serch" type="text" name="search" placeholder="Tìm kiếm sản phẩm"
                                        value="{{ request('search') }}" />
                                    <button type="submit" class="cross"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /Header -->

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row top-footer">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="logo">
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/footer-logo.png" alt="logo" class="img-responsive" />
                    </div>
                    <div class="logo-btm">
                        <div class="adress">
                            <i class="fas fa-location-dot" aria-hidden="true"></i>
                            <span>{{ \App\Models\Setting::get('contact_address', 'Địa chỉ cửa hàng') }}</span>
                        </div>
                        <div class="phone">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <a href="tel:{{ \App\Models\Setting::get('contact_phone') }}">{{ \App\Models\Setting::get('contact_phone', '0123456789') }}</a>
                        </div>
                        <div class="mail">
                            <i class="fas fa-envelope" aria-hidden="true"></i>
                            <a href="mailto:{{ \App\Models\Setting::get('contact_email') }}">{{ \App\Models\Setting::get('contact_email', 'info@fruitshop.com') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="widget-title">Thông tin</div>
                            <ul class="widget">
                                <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="widget-title">Khách hàng</div>
                            <ul class="widget">
                                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                <li><a href="{{ route('about') }}">Về chúng tôi</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="widget-title">Liên kết nhanh</div>
                            <ul class="widget">
                                <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="widget-title">Instagram</div>
                    <div class="insta-img-box">
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/instagram-img-1.jpg" alt="photo" class="img-responsive" />
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/instagram-img-2.jpg" alt="photo" class="img-responsive" />
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/instagram-img-3.jpg" alt="photo" class="img-responsive" />
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/instagram-img-4.jpg" alt="photo" class="img-responsive" />
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/instagram-img-5.jpg" alt="photo" class="img-responsive" />
                        <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/instagram-img-6.jpg" alt="photo" class="img-responsive" />
                    </div>
                </div>
            </div>
            <div class="row bottom-footer">
                <div class="col-md-4 col-sm-12 col-xs-12 lpart">
                    <p class="copyright">© Cửa hàng trái cây <span>{{ date('Y') }} All rights reserved</span></p>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 center-part">
                    <ul class="social">
                        @if(\App\Models\Setting::get('social_facebook'))
                        <li><a href="{{ \App\Models\Setting::get('social_facebook') }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(\App\Models\Setting::get('social_twitter'))
                        <li><a href="{{ \App\Models\Setting::get('social_twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if(\App\Models\Setting::get('social_instagram'))
                        <li><a href="{{ \App\Models\Setting::get('social_instagram') }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        <li><a href="#" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- Go to Top -->
    <a href="#" class="scrollup" aria-label="Lên đầu trang"><i class="fas fa-angle-up"></i></a>

    <!-- jquery first -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap v3.3.7 -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/bootstrap.min.js"></script>
    <!-- carousels -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/responsive-slider.js"></script>
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/owl.carousel.min.js"></script>
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/jquery.event.move.js"></script>
    <!-- Value Slider -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/bootstrap-slider.min.js"></script>
    <!-- Responsive Tab -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/responsiveTabs.min.js"></script>
    <!-- Smoothproducts -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/smoothproducts.min.js"></script>
    <!-- Sameheight -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/jquery.matchHeight-min.js"></script>
    <!-- Gallery with tab -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/jquery.fancybox.min.js"></script>
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/isotope.pkgd.js"></script>
    <!-- Custom Scripts -->
    <script src="https://www.ncodetechnologies.com/OrganicFoodStore/js/custom.js"></script>

    @stack('scripts')
</body>

</html>