<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Cửa hàng trái cây sạch, tươi ngon')">
    <title>@yield('title', 'Trang chủ') - Cửa hàng trái cây</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Bootstrap v3.3.7 (cdnjs) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- Font Icons (theme - local) -->
    <link href="{{ asset('css/fontello.css') }}" rel="stylesheet" />
    <!-- Carousel: responsive-slider (theme - local) -->
    <link href="{{ asset('css/responsive-slider.css') }}" rel="stylesheet" />
    <!-- Owl Carousel 2 (cdnjs) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- Bootstrap Slider (cdnjs) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/css/bootstrap-slider.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- Smoothproducts (theme - local) -->
    <link rel="stylesheet" href="{{ asset('css/smoothproducts.css') }}">
    <!-- Responsive Tabs (cdnjs) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/responsive-tabs/1.4.4/css/responsive-tabs.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- Fancybox 3 (cdnjs) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" crossorigin="anonymous" />
    <!-- Theme custom (local) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/query.css') }}" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome (footer social icons - reliable CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Responsive: chặn scroll ngang trên mobile */
        html, body {
            overflow-x: hidden !important;
            max-width: 100vw !important;
        }
        @media (max-width: 767px) {
            footer, .top-footer, .bottom-footer {
                max-width: 100% !important;
                overflow-x: hidden !important;
            }
            .container, .container-fluid {
                max-width: 100% !important;
            }
        }

        /* Fontello: font load từ local (public/fonts) */
        @font-face {
            font-family: 'fontello';
            src: url("{{ asset('fonts/fontello.eot') }}");
            src: url("{{ asset('fonts/fontello.eot') }}#iefix") format('embedded-opentype'),
                url("{{ asset('fonts/fontello.woff2') }}") format('woff2'),
                url("{{ asset('fonts/fontello.woff') }}") format('woff'),
                url("{{ asset('fonts/fontello.ttf') }}") format('truetype'),
                url("{{ asset('fonts/fontello.svg') }}#fontello") format('svg');
            font-weight: normal;
            font-style: normal;
        }

        /* Logo max-width - tránh logo quá to */
        .nav-header .logo img,
        .menu-logo img {
            max-width: 200px;
            height: auto;
        }
        footer .top-footer .logo img {
            max-width: 180px;
            height: auto;
        }
        .logo-part img {
            max-width: 220px;
            height: auto;
        }

        /* Footer contact: icon + text cùng dòng (mọi màn hình) */
        .footer-contact-line {
            display: inline-flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
            align-items: flex-start !important;
            gap: 8px !important;
        }
        .footer-contact-line i {
            flex: 0 0 auto !important;
            margin-top: 2px;
        }
        .footer-contact-line > span,
        .footer-contact-line > a {
            flex: 1 1 0% !important;
            min-width: 0 !important;
        }

        /* Footer responsive - mobile: canh giữa, gọn đẹp */
        @media (max-width: 767px) {
            footer .top-footer [class*="col-"],
            footer .bottom-footer [class*="col-"] {
                text-align: center !important;
            }
            footer .top-footer .logo {
                text-align: center !important;
            }
            footer .top-footer .logo img {
                margin-left: auto;
                margin-right: auto;
            }
            footer .top-footer .logo-btm {
                text-align: center !important;
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                gap: 12px !important;
            }
            footer .top-footer .logo-btm .adress,
            footer .top-footer .logo-btm .phone,
            footer .top-footer .logo-btm .mail {
                display: flex !important;
                justify-content: center !important;
                width: 100%;
            }
            footer .top-footer .logo-btm .footer-contact-line {
                justify-content: center;
                text-align: center;
            }
            footer .top-footer .logo-btm .footer-contact-line > span {
                text-align: center;
            }
            footer .top-footer .widget-title {
                text-align: center !important;
                margin-top: 20px;
                margin-bottom: 10px;
            }
            footer .top-footer .widget {
                text-align: center !important;
                padding-left: 0;
                list-style: none;
            }
            footer .top-footer .widget li {
                text-align: center !important;
                margin-bottom: 6px;
            }
            footer .top-footer .insta-img-box {
                display: flex;
                flex-wrap: wrap;
                gap: 4px;
                justify-content: center !important;
            }
            footer .top-footer .widget-title + .insta-img-box {
                margin-left: auto;
                margin-right: auto;
            }
            footer .insta-img-box img {
                width: calc(33.333% - 4px);
                height: auto;
            }
            footer .bottom-footer .copyright,
            footer .bottom-footer .lpart {
                text-align: center !important;
            }
            footer .bottom-footer .copyright,
            footer .bottom-footer .lpart p {
                text-align: center !important;
            }
            footer .bottom-footer .center-part {
                text-align: center !important;
            }
            footer .bottom-footer ul.social {
                display: flex !important;
                flex-wrap: wrap !important;
                justify-content: center !important;
                padding-left: 0 !important;
                list-style: none !important;
            }
            /* Certificate scroller: trên mobile căn trái để thấy ảnh đầu tiên */
            .certificate-scroller {
                justify-content: flex-start !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        /* Owl carousel nav: dùng Font Awesome thay vì fontello (icon-right-arrow không load trên mobile) */
        .owl-carousel .owl-nav .owl-prev,
        .owl-carousel .owl-nav .owl-next {
            font-family: "Font Awesome 6 Free" !important;
            font-weight: 900 !important;
            font-size: 18px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        .owl-carousel .owl-nav .owl-prev::before,
        .owl-carousel .owl-nav .owl-next::before {
            display: block !important;
        }
        .owl-carousel .owl-nav .owl-prev::before {
            content: "\f053" !important; /* fa-chevron-left */
        }
        .owl-carousel .owl-nav .owl-next::before {
            content: "\f054" !important; /* fa-chevron-right */
        }
        /* Ẩn nội dung mặc định (fontello / icon-right-arrow) để chỉ hiện FA */
        .owl-carousel .owl-nav .owl-prev > *,
        .owl-carousel .owl-nav .owl-next > * {
            display: none !important;
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
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .responsive-slider .carouseal-caption .caption.header h2 {
            font-size: 72px;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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

        /* Menu styling - Font lớn hơn, đậm hơn, font-family đẹp */
        .navbar-nav>li>a {
            font-size: 16px !important;
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
            letter-spacing: 0.3px;
            padding: 15px 20px !important;
        }

        .navbar-nav>li.active>a,

        /* Dropdown menu items */
        .navbar-nav>li.dropdown .dropdown-menu li a {
            font-size: 15px !important;
            text-transform: none;
        }

        /* Blog listing card description - left aligned with fixed height */
        .blog-card-excerpt {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 10px;
            text-align: left;
            min-height: 70px;
        }

        /* Dropdown menu styling with smooth animation */
        .navbar-nav>li.dropdown {
            position: relative;
        }

        .navbar-nav>li.dropdown .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            min-width: 200px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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

        .navbar-nav>li.dropdown:hover .dropdown-menu {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        .navbar-nav>li.dropdown .dropdown-menu li {
            padding: 0;
            margin: 0;
        }

        .navbar-nav>li.dropdown .dropdown-menu li a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .navbar-nav>li.dropdown .dropdown-menu li a:hover {
            background: #f8f9fa;
            color: #8bc34a;
            border-left-color: #8bc34a;
            padding-left: 23px;
        }

        .navbar-nav>li.dropdown>a .fa-angle-down {
            font-size: 12px;
            margin-left: 4px;
            transition: transform 0.3s ease;
        }

        .navbar-nav>li.dropdown:hover>a .fa-angle-down {
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
            section.helpline {
                overflow-x: hidden !important;
                max-width: 100% !important;
            }
            section.helpline .bgreen {
                overflow-x: hidden !important;
                max-width: 100% !important;
            }
            section.helpline .bgreen .inline {
                overflow-x: auto !important;
                -webkit-overflow-scrolling: touch;
                max-width: 100% !important;
            }
            section.helpline .bgreen .inline .box {
                min-width: 200px;
            }
        }

        /* Fix smoothproducts duplicate issue */
        .sp-wrap.sp-transitioning {
            /* Ẩn original images sau khi plugin đã khởi tạo */
        }

        .sp-wrap>a {
            /* Original images - sẽ bị plugin ẩn tự động */
        }

        /* Đảm bảo chỉ hiển thị 1 set gallery */
        .sp-large,
        .sp-thumbs {
            display: block !important;
        }

        /* Fix related products image size */
        .related-products .related-product-slider .item {
            max-width: 100%;
        }

        .related-products .related-product-slider .item .wrapper {
            max-width: 100%;
        }

        .related-products .related-product-slider .item .pro-img {
            width: 100%;
            height: 280px;
            overflow: hidden;
        }

        .related-products .related-product-slider .item .pro-img img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        /* Khi chỉ có 1 item, giới hạn width và căn lề trái */
        .related-products .owl-carousel.owl-loaded .owl-stage-outer {
            max-width: 100%;
        }

        .related-products .owl-carousel .owl-stage {
            display: flex;
            justify-content: flex-start;
            /* Căn lề trái */
        }

        .related-products .owl-carousel .owl-item {
            max-width: 300px;
            width: 300px;
        }

        @media (max-width: 768px) {
            .related-products .owl-carousel .owl-item {
                max-width: 100%;
                width: 100%;
            }
        }

        /* Product detail page - Tăng font size cho đẹp hơn */
        .product-single-meta .product-name {
            font-size: 32px !important;
            font-weight: 700 !important;
            margin-bottom: 15px !important;
            color: #333;
            line-height: 1.3;
        }

        .product-single-meta .price {
            margin: 15px 0 20px 0 !important;
        }

        .product-single-meta .price .new-price {
            font-size: 28px !important;
            font-weight: 700 !important;
            color: #8bc34a !important;
            display: inline-block;
        }

        .product-single-meta .price .old-price {
            font-size: 20px !important;
            color: #999 !important;
            margin-left: 10px;
            display: inline-block;
        }

        .product-single-meta .availablity {
            font-size: 17px !important;
            margin: 15px 0 !important;
            font-weight: 500;
        }

        .product-single-meta .availablity span {
            font-weight: 700;
            color: #8bc34a;
        }

        .product-single-meta .product-information {
            font-size: 16px !important;
            line-height: 1.7 !important;
            color: #555;
            margin: 15px 0 !important;
        }

        .product-single-meta .product-information strong {
            font-size: 17px;
            color: #333;
        }

        .product-single-meta .cart-btn {
            font-size: 15px !important;
            font-weight: 600 !important;
            padding: 11px 28px !important;
        }

        .product-single-meta .tag-box .tag-label {
            font-size: 15px !important;
            font-weight: 600;
        }

        .product-single-meta .tag-box .tag-label-value {
            font-size: 15px !important;
        }

        .product-single-meta .tag-box .tag-label-value a {
            font-size: 15px !important;
        }

        @media (max-width: 768px) {
            .product-single-meta .product-name {
                font-size: 24px !important;
            }

            .product-single-meta .price .new-price {
                font-size: 22px !important;
            }

            .product-single-meta .price .old-price {
                font-size: 16px !important;
            }

            .product-single-meta .product-information {
                font-size: 14px !important;
            }
        }

        /* Related Products - Cải thiện font và khoảng cách */
        .related-products .item .contain-wrapper {
            padding: 8px 12px 10px 12px !important;
        }

        .related-products .item .contain-wrapper .tit {
            font-size: 15px !important;
            font-weight: 600 !important;
            margin-bottom: 3px !important;
            margin-top: 0 !important;
            line-height: 1.3;
            color: #333;
        }

        .related-products .item .contain-wrapper .price {
            margin: 3px 0 !important;
        }

        .related-products .item .contain-wrapper .price .new-price {
            font-size: 17px !important;
            font-weight: 700 !important;
            color: #8bc34a !important;
        }

        .related-products .item .contain-wrapper .price .old-price {
            font-size: 13px !important;
            color: #999 !important;
            margin-top: 2px;
        }

        .related-products .item .contain-wrapper .btn-part {
            margin-top: 5px !important;
        }

        .related-products .item .contain-wrapper .btn-part .cart-btn {
            font-size: 13px !important;
            font-weight: 600 !important;
            padding: 7px 14px !important;
        }

        .related-products .item .contain-wrapper .btn-part i {
            font-size: 15px !important;
        }

        /* Block sản phẩm (trang chủ, danh sách, chi tiết): title + khoảng cách dưới button */
        .new-arrivals-section .contain-wrapper .tit,
        .new-arrivals-section .item .contain-wrapper .tit,
        #products.product-list .contain-wrapper .tit,
        .related-products .contain-wrapper .tit {
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
            font-size: 17px !important;
            font-weight: 600 !important;
            margin-top: 16px !important;
            margin-bottom: 10px !important;
            padding-bottom: 0 !important;
            line-height: 1.4;
            color: #333;
        }

        .new-arrivals-section .contain-wrapper .btn-part,
        .new-arrivals-section .item .contain-wrapper .btn-part,
        #products.product-list .contain-wrapper .btn-part,
        .related-products .contain-wrapper .btn-part {
            margin-bottom: 25px !important;
        }

        /* Product block: bỏ min-height (hết khoảng trống thừa), padding-bottom vừa đủ */
        .new-arrivals-section .wrapper .contain-wrapper,
        .new-arrivals-section .item .wrapper .contain-wrapper,
        #products.product-list .wrapper .contain-wrapper,
        .related-products .item .contain-wrapper {
            min-height: auto !important;
            padding-bottom: 14px !important;
        }

        /* Product list: ảnh sản phẩm chiều cao cố định, các block bằng nhau */
        #products.product-list .pro-img {
            height: 280px !important;
            overflow: hidden !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: #f5f5f5;
        }
        #products.product-list .pro-img img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            display: block !important;
        }

        /* Trang chủ: ảnh sản phẩm (Trái cây tươi + Ứng dụng & giải pháp) chiều cao cố định */
        .new-arrivals-section .pro-img {
            height: 280px !important;
            overflow: hidden !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background: #f5f5f5;
        }
        .new-arrivals-section .pro-img img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
            display: block !important;
        }

        .related-products .tit h2 {
            font-size: 26px !important;
            font-weight: 700 !important;
            margin-bottom: 20px !important;
        }

        /* Blog listing card title (2 lines max, đồng bộ chiều cao) */
        .blog-list-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 1.4;
            min-height: 2.8em;
            /* luôn chừa chỗ cho 2 dòng */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Blog listing card description - canh trái, chiều cao cố định để các block đều nhau */
        .blog-card-excerpt {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 10px;
            text-align: left;
            height: 4.8em;
            /* ~3 dòng */
            overflow: hidden;
        }

        /* Blog detail page title - nhỏ hơn, in đậm, ngay trên meta */
        .blog-detail-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        @media (max-width: 768px) {
            .related-products .item .contain-wrapper .tit {
                font-size: 15px !important;
                min-height: auto;
            }

            .related-products .item .contain-wrapper .price .new-price {
                font-size: 17px !important;
            }

            .related-products .tit h2 {
                font-size: 22px !important;
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
                        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}"
                                    alt="logo" /></a></div>
                    </div>
                    <div class="collapse" id="organic-food-navigation">
                        <div class="remove"><i class="fas fa-times"></i></div>
                        <div class="menu-logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}"
                                    alt="logo" /></a></div>
                        <ul class="nav navbar-nav">
                            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}">Trang Chủ</a>
                            </li>
                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}">Giới Thiệu</a>
                            </li>
                            <li class="dropdown {{ request()->routeIs('products.*') ? 'active' : '' }}">
                                <a href="{{ route('products.index') }}" class="dropdown-toggle">
                                    Sản Phẩm <i class="fas fa-angle-down"></i>
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
                            <li class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">
                                <a href="{{ route('blog.index') }}">Blog</a>
                            </li>
                            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                <a href="{{ route('contact') }}">Liên Hệ</a>
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
                        <img src="{{ asset('images/footer-logo.png') }}" alt="logo" class="img-responsive" />
                    </div>
                    <div class="logo-btm">
                        <div class="adress">
                            <span class="footer-contact-line"><i class="fas fa-location-dot" aria-hidden="true"></i><span>{{ \App\Models\Setting::get('contact_address', 'Địa chỉ cửa hàng') }}</span></span>
                        </div>
                        <div class="phone">
                            <span class="footer-contact-line"><i class="fas fa-phone" aria-hidden="true"></i><a href="tel:{{ \App\Models\Setting::get('contact_phone') }}">{{ \App\Models\Setting::get('contact_phone', '0123456789') }}</a></span>
                        </div>
                        <div class="mail">
                            <span class="footer-contact-line"><i class="fas fa-envelope" aria-hidden="true"></i><a href="mailto:{{ \App\Models\Setting::get('contact_email') }}">{{ \App\Models\Setting::get('contact_email', 'info@fruitshop.com') }}</a></span>
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
                        <img src="{{ asset('images/instagram-img-1.jpg') }}"
                            alt="photo" class="img-responsive" />
                        <img src="{{ asset('images/instagram-img-2.jpg') }}"
                            alt="photo" class="img-responsive" />
                        <img src="{{ asset('images/instagram-img-3.jpg') }}"
                            alt="photo" class="img-responsive" />
                        <img src="{{ asset('images/instagram-img-4.jpg') }}"
                            alt="photo" class="img-responsive" />
                        <img src="{{ asset('images/instagram-img-5.jpg') }}"
                            alt="photo" class="img-responsive" />
                        <img src="{{ asset('images/instagram-img-6.jpg') }}"
                            alt="photo" class="img-responsive" />
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
                        <li><a href="{{ \App\Models\Setting::get('social_facebook') }}" target="_blank"
                                rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        @endif
                        @if(\App\Models\Setting::get('social_twitter'))
                        <li><a href="{{ \App\Models\Setting::get('social_twitter') }}" target="_blank"
                                rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-twitter"></i></a></li>
                        @endif
                        @if(\App\Models\Setting::get('social_instagram'))
                        <li><a href="{{ \App\Models\Setting::get('social_instagram') }}" target="_blank"
                                rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </li>
                        @endif
                        <li><a href="#" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i
                                    class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

    <!-- Go to Top -->
    <a href="#" class="scrollup" aria-label="Lên đầu trang"><i class="fas fa-angle-up"></i></a>

    <!-- jQuery 1.11.3 (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap v3.3.7 (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!-- Carousels: responsive-slider (theme - local) -->
    <script src="{{ asset('js/responsive-slider.js') }}"></script>
    <!-- Owl Carousel 2 (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js" crossorigin="anonymous"></script>
    <!-- Touch/move events (jsDelivr) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery.event.move@1.3.6/js/jquery.event.move.js" crossorigin="anonymous"></script>
    <!-- Bootstrap Slider (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.6.2/bootstrap-slider.min.js" crossorigin="anonymous"></script>
    <!-- Responsive Tabs (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/responsive-tabs/1.4.4/js/jquery.responsiveTabs.min.js" crossorigin="anonymous"></script>
    <!-- Smoothproducts (theme - local) -->
    <script src="{{ asset('js/smoothproducts.min.js') }}"></script>
    <!-- Match height (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js" crossorigin="anonymous"></script>
    <!-- Fancybox 3 (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" crossorigin="anonymous"></script>
    <!-- Isotope (cdnjs) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" crossorigin="anonymous"></script>
    <!-- Theme custom (local) -->
    <script src="{{ asset('js/custom.js') }}"></script>

    @stack('scripts')
</body>

</html>