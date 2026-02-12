@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="clearfix"></div>

<!-- Banner -->
<section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img class="banner" src="https://www.ncodetechnologies.com/OrganicFoodStore/images/product-page-banner.jpg" alt="banner" />
</section>
<!-- /Banner -->

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li>{{ $post->title }}</li>
            </ul>
            <h1 class="page-tit">{{ $post->title }}</h1>
        </div>
    </div>
</section>
<!-- /Breadcrumb -->

<!-- Content -->
<div class="content-part detail-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <article class="blog-post">
                    @if($post->thumbnail)
                    <div class="post-thumbnail" style="margin-bottom: 30px;">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-responsive" style="width: 100%; border-radius: 8px;" />
                    </div>
                    @endif
                    
                    <div class="post-meta" style="margin-bottom: 20px; color: #999; font-size: 14px;">
                        <span><i class="fas fa-calendar"></i> {{ $post->created_at->format('d/m/Y H:i') }}</span>
                        <span style="margin-left: 20px;"><i class="fas fa-eye"></i> {{ $post->views }} lượt xem</span>
                    </div>
                    
                    <div class="post-content" style="line-height: 1.8; color: #555; font-size: 16px;">
                        @if($post->excerpt)
                        <div class="post-excerpt" style="font-size: 18px; color: #333; margin-bottom: 25px; font-weight: 500;">
                            {{ $post->excerpt }}
                        </div>
                        @endif
                        
                        @if($post->content)
                        <div class="post-body">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                        @endif
                    </div>
                </article>
            </div>
            
            @if($relatedPosts->count() > 0)
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <h3 style="font-size: 20px; font-weight: 600; margin-bottom: 20px;">Bài viết liên quan</h3>
                    @foreach($relatedPosts as $related)
                    <div class="related-post" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #eee;">
                        @if($related->thumbnail)
                        <a href="{{ route('blog.show', $related->slug) }}">
                            <img src="{{ asset('storage/' . $related->thumbnail) }}" alt="{{ $related->title }}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;" />
                        </a>
                        @endif
                        <h4 style="font-size: 16px; font-weight: 600; margin-bottom: 5px;">
                            <a href="{{ route('blog.show', $related->slug) }}" style="color: #333; text-decoration: none;">{{ $related->title }}</a>
                        </h4>
                        <span style="color: #999; font-size: 13px;">{{ $related->created_at->format('d/m/Y') }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- /Content -->
@endsection
