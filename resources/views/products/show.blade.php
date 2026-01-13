@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="clearfix"></div>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="img-responsive" />
                @else
                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/new-arrivals-img-1.jpg"
                    alt="{{ $product->name }}" class="img-responsive" />
                @endif
            </div>

            <div class="col-md-7">
                <h1>{{ $product->name }}</h1>

                <div class="my-4">
                    @if($product->sale_price)
                    <h2 class="text-danger">{{ number_format($product->sale_price) }}đ <del class="text-muted">{{
                            number_format($product->price) }}đ</del></h2>
                    @else
                    <h2 class="text-success">{{ number_format($product->price) }}đ</h2>
                    @endif
                    <p>Đơn vị: {{ $product->unit }}</p>
                </div>

                <div class="my-4">
                    <span class="badge badge-{{ $product->stock > 0 ? 'success' : 'danger' }}">
                        {{ $product->stock > 0 ? 'Còn hàng' : 'Hết hàng' }}
                    </span>
                    @if($product->is_featured)
                    <span class="badge badge-info">Nổi bật</span>
                    @endif
                    @if($product->is_new)
                    <span class="badge badge-primary">Mới</span>
                    @endif
                </div>

                @if($product->description)
                <div class="my-4">
                    <h4>Mô tả ngắn</h4>
                    <p>{{ $product->description }}</p>
                </div>
                @endif

                <div class="my-4">
                    <p><strong>Danh mục:</strong> <a
                            href="{{ route('products.category', $product->category->slug) }}">{{
                            $product->category->name }}</a></p>
                    <p><strong>Lượt xem:</strong> {{ $product->views }}</p>
                </div>
            </div>
        </div>

        @if($product->content)
        <div class="row mt-5">
            <div class="col-12">
                <h3>Chi tiết sản phẩm</h3>
                <div class="content">
                    {!! nl2br(e($product->content)) !!}
                </div>
            </div>
        </div>
        @endif

        @if($relatedProducts->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Sản phẩm liên quan</h3>
                <div class="row">
                    @foreach($relatedProducts as $related)
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="wrapper">
                            <div class="pro-img">
                                @if($related->image)
                                <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}"
                                    class="img-responsive" />
                                @else
                                <img src="https://www.ncodetechnologies.com/OrganicFoodStore/images/new-arrivals-img-1.jpg"
                                    alt="{{ $related->name }}" class="img-responsive" />
                                @endif
                            </div>
                            <div class="contain-wrapper">
                                <div class="tit">{{ $related->name }}</div>
                                <div class="price">
                                    @if($related->sale_price)
                                    <div class="new-price">{{ number_format($related->sale_price) }}đ</div>
                                    <div class="old-price"><del>{{ number_format($related->price) }}đ</del></div>
                                    @else
                                    <div class="new-price">{{ number_format($related->price) }}đ</div>
                                    @endif
                                </div>
                                <div class="btn-part">
                                    <a href="{{ route('products.show', $related->slug) }}" class="cart-btn">Xem chi
                                        tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection