@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div class="clearfix"></div>

<!-- Banner -->
<section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img class="banner" src="{{ asset('images/product-page-banner.jpg') }}" alt="Banner" />
</section>
<!-- /Banner -->

<!-- Breadcrumb -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
</section>
<!-- /Breadcrumb -->

<!-- Content -->
<div class="content-part listing-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    @forelse($posts as $post)
                    <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 30px;">
                        <div class="wrapper" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            @if($post->thumbnail)
                            <div class="pro-img">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="img-responsive" style="width: 100%; height: 250px; object-fit: cover;" />
                                </a>
                            </div>
                            @endif
                            <div class="contain-wrapper" style="padding: 20px;">
                                <div class="tit" style="font-size: 18px; font-weight: 600; margin-bottom: 10px;">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="blog-list-title" style="color: #333; text-decoration: none;">
                                        {{ Str::limit($post->title, 60) }}
                                    </a>
                                </div>
                                @if($post->excerpt)
                                <p class="blog-card-excerpt">{{ Str::limit($post->excerpt, 140) }}</p>
                                @endif
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                                    <span style="color: #999; font-size: 13px;">{{ $post->created_at->format('d/m/Y') }}</span>
                                    <a href="{{ route('blog.show', $post->slug) }}" style="color: #8bc34a; font-weight: 600; text-decoration: none;">Đọc thêm →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-sm-12 col-xs-12">
                        <p class="text-center">Chưa có bài viết nào.</p>
                    </div>
                    @endforelse
                </div>
                
                @if($posts->hasPages())
                <div class="col-sm-12 col-xs-12">
                    <nav aria-label="Phân trang">
                        <ul class="pagination">
                            <li class="page-item indicator left {{ $posts->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $posts->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            @php
                                $current = $posts->currentPage();
                                $last = $posts->lastPage();
                                $start = max(1, $current - 2);
                                $end = min($last, $current + 2);
                            @endphp
                            @foreach(range($start, $end) as $page)
                            <li class="page-item {{ $page == $current ? 'active' : '' }}">
                                <a class="page-link" href="{{ $posts->url($page) }}">{{ $page }}</a>
                            </li>
                            @endforeach
                            <li class="page-item indicator right {{ !$posts->hasMorePages() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $posts->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- /Content -->
@endsection
