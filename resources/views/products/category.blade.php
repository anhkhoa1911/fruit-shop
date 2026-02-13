@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="clearfix"></div>

<!-- Banner -->
<section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img class="banner" src="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-page-banner.jpg" alt="Banner" />
</section>
<!-- /Banner -->

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                <li>{{ $category->name }}</li>
            </ul>
            <h1 class="page-tit">{{ $category->name }}</h1>
        </div>
    </div>
</section>
<!-- /Breadcrumb -->

<!-- Content -->
<div class="content-part listing-page">
    <div class="container">
        <div class="row">
            <!-- Content left -->
            <aside class="col-md-4 col-sm-12 col-xs-12">
                <div id="sidebar">
                    <div class="widget categories-widget">
                        <div class="widget-tit">
                            <h2>Danh mục</h2>
                            <div class="button" data-toggle="collapse" data-target="#categories">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <div class="widget-contian" id="categories">
                            <ul class="level-1 open">
                                <li><a href="{{ route('products.index') }}">Tất cả sản phẩm</a></li>
                                @foreach($categories as $cat)
                                <li><a href="{{ route('products.category', $cat->slug) }}" class="{{ $cat->id == $category->id ? 'active' : '' }}">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget price-range-widget">
                        <div class="widget-tit">
                            <h2>Theo giá</h2>
                            <div class="button" data-toggle="collapse" data-target="#price">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <div class="widget-contian" id="price">
                            <input id="price-range" type="text" class="span2" value="" data-slider-min="0" data-slider-max="500000" data-slider-step="10000" data-slider-value="[{{ request('min_price', 0) }},{{ request('max_price', 500000) }}]"/>
                            <span id="min-price-display">{{ number_format(request('min_price', 0)) }}đ - </span> <span id="max-price-display">{{ number_format(request('max_price', 500000)) }}đ</span>
                            <a class="filter-btn" href="#" id="price-filter-btn">Lọc</a>
                        </div>
                    </div>
                    <div class="hot-collection">
                        <a href="{{ route('products.index') }}"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/hot-collection-img.jpg" alt="hot collection" class="img-responsive" /></a>
                    </div>
                </div>
            </aside>
            <!-- /Content left -->

            <!-- Content Right -->
            <div class="col-md-8 col-sm-12 col-xs-12">
                @if($category->description)
                <p class="mar-btm-20">{{ $category->description }}</p>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="filter">
                            <div class="r-part">
                                <div class="shorting-box-1">
                                    <label class="shorting-label">Sắp xếp:</label>
                                    <select id="exampleSelect1" onchange="window.location.href=this.value">
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'default'])) }}" {{ request('sort') == 'default' || !request('sort') ? 'selected' : '' }}>Mặc định</option>
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'name_asc'])) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên: A → Z</option>
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'name_desc'])) }}" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên: Z → A</option>
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'price_asc'])) }}" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp → Cao</option>
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'price_desc'])) }}" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao → Thấp</option>
                                    </select>
                                </div>
                                <div class="shorting-box-2">
                                    <label class="shorting-label">Hiển thị:</label>
                                    <select id="exampleSelect2" onchange="window.location.href=this.value">
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['per_page' => 12])) }}" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['per_page' => 24])) }}" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                                        <option value="{{ route('products.category', $category->slug) }}?{{ http_build_query(array_merge(request()->query(), ['per_page' => 30])) }}" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
                                    </select>
                                </div>
                                <div class="grid-short">
                                    <div class="grid-layout"><a class="active" href="#" id="grid"><i class="fas fa-th"></i></a></div>
                                    <div class="list-grid"><a href="#" id="list-btn"><i class="fas fa-list"></i></a></div>
                                </div>
                            </div>
                            <div class="l-part">
                                <div>Hiển thị <span>{{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}</span> / <span>{{ $products->total() }}</span> kết quả</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="products" class="product-list list-group">
                    @forelse($products as $product)
                    <div class="col-sm-4 col-xs-12 item">
                        <div class="wrapper">
                            <div class="pro-img">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-responsive" />
                                @else
                                    <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-img-1.jpg" alt="{{ $product->name }}" class="img-responsive" />
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
                                    <a href="{{ route('products.show', $product->slug) }}" class="cart-btn">Xem chi tiết</a>
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                            <div class="wrapper-box-hover">
                                <div class="text">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-heart"></i></a></li>
                                        <li><a href="{{ route('products.show', $product->slug) }}"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="{{ route('contact') }}?product={{ urlencode($product->name) }}"><i class="fas fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @if($product->is_sale)
                            <div class="sale">sale</div>
                            @endif
                            @if($product->is_new)
                            <div class="new">mới</div>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-sm-12 col-xs-12">
                        <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
                    </div>
                    @endforelse
                </div>
                @if($products->hasPages())
                <div class="col-sm-12 col-xs-12">
                    <nav aria-label="Phân trang">
                        <ul class="pagination">
                            <li class="page-item indicator left {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            @php
                                $current = $products->currentPage();
                                $last = $products->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                            @endphp
                            @foreach(range($start, $end) as $page)
                            <li class="page-item {{ $page == $current ? 'active' : '' }}">
                                <a class="page-link" href="{{ $products->url($page) }}">{{ $page }}</a>
                            </li>
                            @endforeach
                            <li class="page-item indicator right {{ !$products->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @endif
            </div>
            <!-- /Content Right -->
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
    $(document).ready(function() {
        // Price range slider
        var priceSlider = null;
        if ($('#price-range').length && typeof $.fn.slider !== 'undefined') {
            var minPrice = {{ request('min_price', 0) }};
            var maxPrice = {{ request('max_price', 500000) }};
            
            priceSlider = $('#price-range').slider({
                tooltip: 'hide'
            });
            
            // Update display when slider changes
            priceSlider.on('slide', function(slideEvt) {
                $('#min-price-display').text(slideEvt.value[0].toLocaleString('vi-VN') + 'đ - ');
                $('#max-price-display').text(slideEvt.value[1].toLocaleString('vi-VN') + 'đ');
            });
        }
        
        // Price filter button click
        $('#price-filter-btn').on('click', function(e) {
            e.preventDefault();
            
            var values = [0, 500000]; // default values
            
            if (priceSlider) {
                values = priceSlider.slider('getValue');
            }
            
            var currentUrl = new URL(window.location.href);
            var params = new URLSearchParams(currentUrl.search);
            
            // Update or add price params
            params.set('min_price', values[0]);
            params.set('max_price', values[1]);
            
            // Reset to page 1 when filtering
            params.delete('page');
            
            // Redirect with new params
            window.location.href = currentUrl.pathname + '?' + params.toString();
        });
    });
</script>
@endpush
