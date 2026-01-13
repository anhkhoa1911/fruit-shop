@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="clearfix"></div>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="bg-white p-4">
                    <h3 class="mb-4">Danh mục</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('products.index') }}" class="text-dark">Tất cả sản phẩm</a></li>
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('products.category', $cat->slug) }}"
                                class="text-dark {{ $cat->id == $category->id ? 'font-weight-bold' : '' }}">
                                {{ $cat->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="section-tit mb-4">
                    <h2><span>{{ $category->name }}</span></h2>
                    @if($category->description)
                    <p>{{ $category->description }}</p>
                    @endif
                </div>

                <div class="row">
                    @forelse($products as $product)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="wrapper">
                            <div class="pro-img">
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-responsive" />
                                @else
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/new-arrivals-img-1.jpg"
                                    alt="{{ $product->name }}" class="img-responsive" />
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
                                    <a href="{{ route('products.show', $product->slug) }}" class="cart-btn">Xem chi
                                        tiết</a>
                                </div>
                            </div>
                            @if($product->is_new)
                            <div class="new">mới</div>
                            @endif
                            @if($product->is_sale)
                            <div class="sale">sale</div>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="text-center">Không có sản phẩm nào trong danh mục này.</p>
                    </div>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection