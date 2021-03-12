@extends('layouts.index')

@section('title'){{ $company->title ?? env('APP_NAME') }}@endsection
@section('meta_description'){{ $company->meta_description }}@endsection

@section('content')
    <section class="company-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-top: 40px">
                    <h1 class="title">{{ $company->name }}</h1>
                </div>
            </div>
        </div>
{{--        @if(isset($company->top_sliders->visibility) and $company->top_sliders->visibility == '1')--}}
        <div class="slider-company-block">
            <div class="slider-company">
                @foreach($top_banner as $item)
{{--                    @if($item->visibility == '1')--}}
                        <div class="item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 wrapper">
                                        <div class="left">
                                        {!! $item->description !!}
                                        </div>
                                        @if($item->img)
                                        <div class="right" style="background-image: url('/storage/{{ $item->img }}');">
                                            <img src="/storage/{{ $item->img }}" alt="">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                    @endif--}}
                @endforeach

            </div>
            <div class="slider-company-nav">
                <div class="btn-wrap">
                    <button class="btn-slider" id="slider-company-prev-btn"><i class="demo-icon icon-arrow-left"></i></button>
                    <button class="btn-slider" id="slider-company-next-btn"><i class="demo-icon icon-arrow-right"></i></button>
                </div>
                <div class="slider-company-thumb">
                    @foreach($company->top_sliders->items as $item)
                        @if($item->visibility == '1')
                            <div class="item">
                                <i class="demo-icon icon-doctor"></i>
                                <p>{{ $item->title }}</p>
                            </div>
                        @endif
                    @endforeach

                </div>
                <div class="slick-dots-custom2"></div>
            </div>
        </div>
{{--        @endif--}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="gray-panel">
                        <h3>{{ $company->h3 }}</h3>
                        <div class="wrap">
                            <div class="advant-item">
                                <strong>{{ $company->practice }}</strong>
                                <p>Наш опыт</p>
                            </div>
                            <div class="advant-item">
                                <strong>{{ $company->cnt }}</strong>
                                <p>Проведено процедур</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="icon-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    {!! $company->description !!}
                </div>
                <div class="col-lg-6">
                    <div class="icon-wrap">
                        @if($company->ico1 or $company->service1)
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $company->ico1 }}" alt=""></div>
                            <p>{{ $company->service1 }}</p>
                        </div>
                        @endif
                        @if($company->ico2 or $company->service2)
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $company->ico2 }}" alt=""></div>
                            <p>{{ $company->service2 }}</p>
                        </div>
                        @endif
                        @if($company->ico3 or $company->service3)
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $company->ico3 }}" alt=""></div>
                            <p>{{ $company->service3 }}</p>
                        </div>
                        @endif
                        @if($company->ico4 or $company->service4)
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $company->ico4 }}" alt=""></div>
                            <p>{{ $company->service4 }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php //$middle_slider = $company->middle_sliders; ?>
{{--    @if(isset($middle_slider->visibility) and $middle_slider->visibility == '1')--}}
    <section class="gallery-company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="blue-panel">{!! $banner_two_text->description !!}</div>
                    <div class="nav-slider-gallery">
                        <button class="btn-slider" id="gallery-company-prev-btn"><i class="demo-icon icon-arrow-left"></i></button>
                        <button class="btn-slider" id="gallery-company-next-btn"><i class="demo-icon icon-arrow-right"></i></button>
                    </div>
                </div>
                <div class="col-lg-6">
{{--                    @if($middle_slider->items->count() > 0)--}}
                    <div class="gallery-company-slider">
                        @foreach($banner_two as $item)
                            @if($item->img)
                        <div class="item"><a href="/storage/{{ $item->img }}" class="popup"><img src="/storage/{{ $item->img }}" alt=""></a></div>
                            @endif
                        @endforeach
                    </div>
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </section>
{{--    @endif--}}
    <?php //$bottom_sliders = $company->bottom_sliders; ?>
{{--    @if(isset($bottom_sliders->visibility) and $bottom_sliders->visibility == '1')--}}
    <section class="cert-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">Сертификаты</h2>
                    <div class="cert-slider popup-gallery">
{{--                        @foreach($bottom_sliders->items as $item)--}}
                        @foreach($banner_certificates as $item)
{{--                            @if($item->visibility == '1')--}}
                                @if($item->img)
                        <div class="item"><a href="/storage/{{ $item->img }}"><img src="/storage/{{ $item->img }}" alt=""></a></div>
{{--                                @endif--}}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    @endif--}}

    @if($reviews->count() > 0)
    <section class="reviews-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h2 class="title">Отзывы <a href="{{ route('front.reviews') }}">Все отзывы</a></h2>
                    <a href="#add-reviews" class="btn btn-reviews-desktop btn-indigo popup-with-form">Написать отзыв</a>
                </div>
                <div class="col-lg-9">
                    <div class="reviews-slider">
                        @foreach($reviews as $review)
                        <div class="item">
                            <div class="review">
                                <div class="author">{{ $review->name }}</div>
                                <p>{{ $review->content }}</p>
                                <div class="date">{{ (new DateTime($review->updated_at))->format('d.m.Y H:i') }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="#add-reviews" class="btn btn-reviews-mobile btn-indigo popup-with-form">Написать отзыв</a>
                </div>

            </div>
        </div>
    </section>
    @endif
    @if($latest_news->count() > 0)
    <section class="news-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">Новости <a href="{{ route('front.news.index') }}">Все новости</a></h2>
                    <div class="wrapper">
                        @foreach($latest_news as $post)
                        <div class="news-box">
                            <div class="info">
                                <div class="date">{{ (new DateTime($post->updated_at))->format('d.m.Y') }}</div>
                                <div class="time">{{ $post->read_time }}</div>
                            </div>
                            <div class="title"><a href="{{ route('front.news.show', ['slug' => $post->slug]) }}">{{ $post->name }}</a></div>
                            <div class="desc">{{ mb_strimwidth(strip_tags($post->content), 0, 110, '...') }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

@section('footer_script')

@endsection
