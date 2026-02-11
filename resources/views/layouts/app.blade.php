<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Cửa hàng trái cây sạch, tươi ngon')">
    <title>@yield('title', 'Trang chủ') - Cửa hàng trái cây</title>

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
                        <div class="remove"><i class="icon-cancel-music"></i></div>
                        <div class="menu-logo"><a href="{{ route('home') }}"><img
                                    src="https://www.ncodetechnologies.com/OrganicFoodStore/images/logo.png"
                                    alt="logo" /></a></div>
                        <ul class="nav navbar-nav">
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a
                                    href="{{ route('home') }}">Trang chủ</a></li>
                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a
                                    href="{{ route('about') }}">Giới thiệu</a></li>
                            <li class="{{ request()->routeIs('products.*') ? 'active' : '' }}"><a
                                    href="{{ route('products.index') }}">Sản phẩm</a></li>
                            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a
                                    href="{{ route('contact') }}">Liên hệ</a></li>
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
                                    <button type="submit" class="cross"><i class="icon-magnifying-glass"></i></button>
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