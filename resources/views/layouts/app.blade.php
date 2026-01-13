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
    <!-- Custom Style -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/style.css" rel="stylesheet" />
    <!-- Custom Responsive Style -->
    <link href="https://www.ncodetechnologies.com/OrganicFoodStore/css/query.css" rel="stylesheet" />
    <!-- Google Font Style -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
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
        <div class="top-header">
            <div class="lpart">
                <div class="tel-and-email">
                    <p class="tel">Điện thoại: <a
                            href="tel:{{ \App\Models\Setting::get('contact_phone', '0123456789') }}">{{
                            \App\Models\Setting::get('contact_phone', '0123456789') }}</a></p>
                    <p class="mail">Email: <a
                            href="mailto:{{ \App\Models\Setting::get('contact_email', 'info@fruitshop.com') }}">{{
                            \App\Models\Setting::get('contact_email', 'info@fruitshop.com') }}</a></p>
                </div>
            </div>
            <div class="rpart">
                @auth
                @if(auth()->user()->is_admin)
                <div class="account">
                    <div class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-avatar"></i>Admin <i
                            class="icon-angle-down"></i></div>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.dashboard') }}">Quản trị</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Đăng
                                    xuất</a>
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
                @endauth
            </div>
        </div>
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
                <div class="search-and-cart">
                    <div class="search">
                        <div class="search-inner"><a href="#"><i class="icon-magnifying-glass"></i></a></div>
                    </div>
                </div>
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
            <div class="row">
                <div class="top-footer">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="logo"> <img
                                src="https://www.ncodetechnologies.com/OrganicFoodStore/images/footer-logo.png"
                                alt="logo" class="img-responsive" /> </div>
                        <div class="logo-btm">
                            <div class="adress"><i class="icon-placeholder"></i><span>{{
                                    \App\Models\Setting::get('contact_address', 'Địa chỉ cửa hàng') }}</span></div>
                            <div class="phone"><i class="icon-icon"></i><a
                                    href="tel:{{ \App\Models\Setting::get('contact_phone') }}">{{
                                    \App\Models\Setting::get('contact_phone', '0123456789') }}</a></div>
                            <div class="mail"><i class="icon-envelope"></i><a
                                    href="mailto:{{ \App\Models\Setting::get('contact_email') }}">{{
                                    \App\Models\Setting::get('contact_email', 'info@fruitshop.com') }}</a></div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12">
                        <div class="col-sm-4 col-xs-12">
                            <div class="widget-title">Thông tin</div>
                            <ul class="widget">
                                <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                                <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="lpart">
                        <p class="copyright">© Cửa hàng trái cây <span>{{ date('Y') }} All rights reserved</span></p>
                    </div>
                    <div class="center-part">
                        <ul class="social">
                            @if(\App\Models\Setting::get('social_facebook'))
                            <li><a href="{{ \App\Models\Setting::get('social_facebook') }}" target="_blank"><i
                                        class="icon-facebook"></i></a></li>
                            @endif
                            @if(\App\Models\Setting::get('social_twitter'))
                            <li><a href="{{ \App\Models\Setting::get('social_twitter') }}" target="_blank"><i
                                        class="icon-twitter"></i></a></li>
                            @endif
                            @if(\App\Models\Setting::get('social_instagram'))
                            <li><a href="{{ \App\Models\Setting::get('social_instagram') }}" target="_blank"><i
                                        class="icon-instagram"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- Go to Top -->
    <a href="#" class="scrollup"><i class="icon-angle-up"></i></a>

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