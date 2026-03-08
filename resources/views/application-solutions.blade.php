@extends('layouts.app')

@section('title', 'Ứng dụng và giải pháp')

@section('content')
<div class="clearfix"></div>

<section class="sub-banner">
    <h2 class="sr-only">Banner</h2>
    <img class="banner" src="{{ asset('images/cart-page-banner.jpg') }}" alt="Ứng dụng và giải pháp" />
</section>

<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb">
            <ul class="list-inline">
                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                <li>Ứng dụng và giải pháp</li>
            </ul>
        </div>
    </div>
</section>

<div class="content-part page">
    <section class="application-solutions-page">
        <div class="container">
            <div class="section-tit">
                <div class="inner">
                    <h2><span>Ứng dụng và giải pháp</span></h2>
                </div>
            </div>

            @if($applicationSolutionDescription)
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-xs-12">
                    <p class="application-solutions-intro">{!! nl2br(e($applicationSolutionDescription)) !!}</p>
                </div>
            </div>
            @endif

            @if(count($applicationSolutionGallery))
            <div class="row application-solutions-grid">
                @foreach($applicationSolutionGallery as $index => $path)
                    @php
                        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                        $productName = $productNames[$index] ?? basename($path);
                    @endphp
                    <div class="col-md-4 col-sm-6 col-xs-4 application-solution-item">
                        @if(in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                        <a href="{{ asset('storage/' . $path) }}"
                            class="application-solution-card"
                            data-fancybox="application-solution-page-gallery"
                            data-caption="{{ $productName }}">
                            <span class="application-solution-media">
                                <img src="{{ asset('storage/' . $path) }}" alt="{{ $productName }}" class="img-responsive" />
                            </span>
                            <span class="application-solution-content">
                                <span class="application-solution-title">{{ $productName }}</span>
                            </span>
                        </a>
                        @else
                        <a href="{{ asset('storage/' . $path) }}"
                            class="application-solution-card application-solution-card--document"
                            target="_blank"
                            rel="noopener">
                            <span class="application-solution-media application-solution-media--document">
                                <span class="application-solution-file-icon">PDF</span>
                            </span>
                            <span class="application-solution-content">
                                <span class="application-solution-title">{{ $productName }}</span>
                            </span>
                        </a>
                        @endif
                    </div>
                @endforeach
            </div>
            @else
            <p class="application-solutions-empty">Chưa có hình ảnh. Vui lòng upload tại Admin → Cài đặt → Ứng dụng & giải pháp.</p>
            @endif
        </div>
    </section>
</div>

<style>
    .application-solutions-page {
        padding-bottom: 20px;
    }

    .application-solutions-intro {
        margin: -10px 0 35px;
        text-align: center;
        color: #666;
        font-size: 16px;
        line-height: 1.8;
    }

    .application-solutions-grid .col-md-4,
    .application-solutions-grid .col-sm-6,
    .application-solutions-grid .col-xs-4 {
        margin-bottom: 30px;
    }

    .application-solution-card {
        position: relative;
        display: block;
        overflow: hidden;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 14px 34px rgba(0, 0, 0, 0.1);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .application-solution-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 42px rgba(0, 0, 0, 0.16);
    }

    .application-solution-media {
        display: block;
        overflow: hidden;
        background: #edf4ea;
    }

    .application-solution-media img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        transition: transform 0.35s ease;
    }

    .application-solution-card:hover .application-solution-media img {
        transform: scale(1.06);
    }

    .application-solution-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, rgba(41, 101, 34, 0.08) 0%, rgba(29, 86, 22, 0.72) 100%);
        opacity: 0;
        transition: opacity 0.25s ease;
    }

    .application-solution-card:hover .application-solution-overlay {
        opacity: 1;
    }

    .application-solution-label {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 130px;
        padding: 12px 18px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.95);
        color: #2f7d25;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .application-solution-content {
        display: block;
        padding: 18px 18px 20px;
        text-align: center;
        background: #fff;
    }

    .application-solution-title {
        display: block;
        color: #2f3a2d;
        font-size: 18px;
        font-weight: 700;
        line-height: 1.4;
        min-height: calc(1.4em * 2);
    }

    .application-solution-card--document .application-solution-media--document {
        height: 260px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #edf7e8 0%, #d8ebcf 100%);
    }

    .application-solution-file-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 92px;
        height: 92px;
        border-radius: 50%;
        background: #fff;
        color: #3d7d24;
        font-size: 26px;
        font-weight: 800;
        box-shadow: 0 10px 24px rgba(61, 125, 36, 0.16);
    }

    .application-solutions-empty {
        margin: 10px 0 20px;
        text-align: center;
        color: #666;
    }

    @media (max-width: 767px) {
        .application-solutions-intro {
            font-size: 15px;
            margin-bottom: 24px;
        }

        .application-solutions-grid {
            margin-left: -6px;
            margin-right: -6px;
        }

        .application-solution-item {
            padding-left: 6px;
            padding-right: 6px;
            margin-bottom: 12px !important;
        }

        .application-solution-media img,
        .application-solution-card--document .application-solution-media--document {
            height: 110px;
        }

        .application-solution-card {
            border-radius: 12px;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        }

        .application-solution-title {
            font-size: 12px;
            line-height: 1.35;
            min-height: calc(1.35em * 2);
        }

        .application-solution-content {
            padding: 10px 8px 12px;
        }

        .application-solution-file-icon {
            width: 56px;
            height: 56px;
            font-size: 18px;
        }

        .application-solution-overlay,
        .application-solution-label {
            display: none;
        }
    }
</style>
@endsection
