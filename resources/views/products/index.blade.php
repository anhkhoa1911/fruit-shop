@extends('layouts.app')

@section('title', 'Sản phẩm')

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
                <li>Sản phẩm</li>
            </ul>
            <h1 class="page-tit">Sản phẩm</h1>
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
                                <li><a href="{{ route('products.category', $cat->slug) }}">{{ $cat->name }}</a></li>
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
                            <input id="price-range" type="text" class="span2" value="" data-slider-min="0" data-slider-max="500000" data-slider-step="10000" data-slider-value="[50000,200000]"/>
                            <span>0đ</span> <span>500.000đ</span>
                            <a class="filter-btn" href="{{ route('products.index') }}">Lọc</a>
                        </div>
                    </div>
                    @if(isset($topSellers) && $topSellers->count() > 0)
                    <div class="widget top-seller-widget" data-toggle="collapse" data-target="#top-seller">
                        <div class="widget-tit">
                            <h2>Bán chạy</h2>
                            <div class="button">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <div class="widget-contian" id="top-seller">
                            @foreach($topSellers as $p)
                            <div class="seller-box">
                                <div class="seller-img">
                                    @if($p->image)
                                        <a href="{{ route('products.show', $p->slug) }}"><img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}" class="img-responsive" /></a>
                                    @else
                                        <a href="{{ route('products.show', $p->slug) }}"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/top-seller-img-1.jpg" alt="{{ $p->name }}" class="img-responsive" /></a>
                                    @endif
                                </div>
                                <div class="seller-text">
                                    <a class="seller-name" href="{{ route('products.show', $p->slug) }}">{{ $p->name }}</a>
                                    <div class="ratting">
                                        <ul>
                                            <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/green-star.png" alt="star" class="img-responsive"></a></li>
                                            <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/green-star.png" alt="star" class="img-responsive"></a></li>
                                            <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/dark-star.png" alt="star" class="img-responsive"></a></li>
                                            <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/dark-star.png" alt="star" class="img-responsive"></a></li>
                                            <li><a href="#"><img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/dark-star.png" alt="star" class="img-responsive"></a></li>
                                        </ul>
                                    </div>
                                    <div class="price">{{ number_format($p->sale_price ?? $p->price) }}đ</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="widget tag-widgwet">
                        <div class="widget-tit">
                            <h2>Thẻ phổ biến</h2>
                            <div class="button" data-toggle="collapse" data-target="#tag">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                        </div>
                        <div class="widget-contian" id="tag">
                            <div class="tag-div">
                                <a class="tag-btn" href="{{ route('products.index') }}">Tất cả</a>
                                @foreach($categories as $cat)
                                <a class="tag-btn" href="{{ route('products.category', $cat->slug) }}">{{ $cat->name }}</a>
                                @endforeach
                            </div>
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
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="filter">
                            <div class="r-part">
                                <div class="shorting-box-1">
                                    <label class="shorting-label">Sắp xếp:</label>
                                    <select id="exampleSelect1" onchange="window.location.href=this.value">
                                        <option value="{{ request()->url() }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'default'])) }}" {{ request('sort') == 'default' || !request('sort') ? 'selected' : '' }}>Mặc định</option>
                                        <option value="{{ request()->url() }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'name_asc'])) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>A → Z</option>
                                        <option value="{{ request()->url() }}?{{ http_build_query(array_merge(request()->query(), ['sort' => 'name_desc'])) }}" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Z → A</option>
                                    </select>
                                </div>
                                <div class="shorting-box-2">
                                    <label class="shorting-label">Hiển thị:</label>
                                    <select id="exampleSelect2" onchange="window.location.href=this.value">
                                        <option value="{{ request()->url() }}?{{ http_build_query(array_merge(request()->query(), ['per_page' => 12])) }}" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                                        <option value="{{ request()->url() }}?{{ http_build_query(array_merge(request()->query(), ['per_page' => 24])) }}" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                                        <option value="{{ request()->url() }}?{{ http_build_query(array_merge(request()->query(), ['per_page' => 30])) }}" {{ request('per_page') == 30 ? 'selected' : '' }}>30</option>
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
                                    @if($product->sale_price)
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
                        <p class="text-center">Không có sản phẩm nào.</p>
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
        // Price range slider (optional - requires bootstrap-slider)
        if ($('#price-range').length && typeof $.fn.slider !== 'undefined') {
            $('#price-range').slider({});
        }
    });
</script>
@endpush
