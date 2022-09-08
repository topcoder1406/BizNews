@extends('layouts.main')
@section('title', 'BizNews')

@section('additional-content-on-top')
    @php
        $other_main_news = $main_news->slice(4);
        $main_news->splice(4);
    @endphp
    <!-- Main News Slider Start -->
    @if($other_main_news->count() == 4)
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 px-0">
                    <div class="owl-carousel main-carousel position-relative">
                        @foreach($main_news as $post)
                            <x-main-news-carousel-post-card :post="$post"></x-main-news-carousel-post-card>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 px-0">
                    <div class="row mx-0">
                        @foreach($other_main_news as $post)
                            <div class="col-md-6 px-0">
                                <x-main-news-post-card :post="$post"></x-main-news-post-card>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News Slider End -->

        <!-- Breaking News Start -->
        <div class="container-fluid bg-dark py-3 mb-3">
            <div class="container">
                <div class="row align-items-center bg-dark">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px">
                                Breaking News
                            </div>
                            <div
                                class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                                style="width: calc(100% - 190px); padding-right: 90px;">
                                @foreach($breaking_news as $post)
                                    <div class="text-truncate">
                                        <a class="text-white text-uppercase font-weight-semi-bold" href="">
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- Breaking News End -->

    <!-- Featured News Slider Start -->
    @if($featured_news->count() > 4)
        <div class="container-fluid pt-5 mb-3">
            <div class="container">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
                </div>
                <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                    @foreach($featured_news as $post)
                        <x-featured-post-card :post="$post"></x-featured-post-card>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Featured News Slider End -->
@endsection

@section('main-content')
    <div class="row" id="latest-news">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
            </div>
        </div>

        <x-post-card-md :post="$posts[0]"></x-post-card-md>
        @if($posts->count() > 1)
            <x-post-card-md :post="$posts[1]"></x-post-card-md>
        @endif
        @if($posts->count() > 2)
            <x-post-card-md :post="$posts[2]"></x-post-card-md>
        @endif
        @if($posts->count() > 3)
            <x-post-card-md :post="$posts[3]"></x-post-card-md>
        @endif
        @if($posts->count() > 4)
            <div class="col-lg-6">
                <x-post-card-sm :post="$posts[4]"></x-post-card-sm>
                @if($posts->count() > 5)
                    <x-post-card-sm :post="$posts[5]"></x-post-card-sm>
                @endif
            </div>
        @endif
        @if($posts->count() > 6)
            <div class="col-lg-6">
                <x-post-card-sm :post="$posts[6]"></x-post-card-sm>
                @if($posts->count() > 7)
                    <x-post-card-sm :post="$posts[7]"></x-post-card-sm>
                @endif
            </div>
        @endif
        @if($posts->count() > 8)
            <x-post-card-lg :post="$posts[8]"></x-post-card-lg>
        @endif
        @if($posts->count() > 9)
            <div class="col-lg-6">
                <x-post-card-sm :post="$posts[9]"></x-post-card-sm>
                @if($posts->count() > 10)
                    <x-post-card-sm :post="$posts[10]"></x-post-card-sm>
                @endif
            </div>
        @endif
        @if($posts->count() > 11)
            <div class="col-lg-6">
                <x-post-card-sm :post="$posts[11]"></x-post-card-sm>
                @if($posts->count() > 12)
                    <x-post-card-sm :post="$posts[12]"></x-post-card-sm>
                @endif
            </div>
        @endif
        <div class="col-12">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
