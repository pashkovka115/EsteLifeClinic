@extends('layouts.index')

@section('title'){{ $news->title }}@endsection
@section('meta_description'){{ $news->meta_description }}@endsection

@section('content')
    <section class="news-title-block" style="background-image: url('/storage/{{ $news->bg_img }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="info">
                        <div class="date">{{ (new DateTime($news->updated_at))->format('d.m.Y') }}</div>
                        <div class="time">{{ $news->read_time }}</div>
                    </div>
                    <h1 class="title">{{ $news->name }}</h1>
                    <div class="share">
                        <h4>Поделиться в соц.сетях</h4>
                        <button class="share-btn"><img src="/img/icon/whatsapp.svg" alt=""></button>
                        <button class="share-btn"><img src="/img/icon/telegram.svg" alt=""></button>
                        <button class="share-btn"><img src="/img/icon/facebook-white.svg" alt=""></button>
                        <button class="share-btn"><img src="/img/icon/vk-white.svg" alt=""></button>
                        <button class="share-btn"><img src="/img/icon/insta-white.svg" alt=""></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="crumbs">
                        <ol>
                            <li><a href="{{ route('front.news.index') }}">Все новости</a></li>
                            <li>{{ $news->name }}</li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12 wrapper">
                    <div class="news-content">
                        <div class="top-panel-news">
                            <div class="menu-news">
                                <ul>
                                    <li><a href="{{ route('front.news.index') }}">Все новости</a></li>
                                    @foreach($categories as $category)
                                    <li @if($category->slug == $news->category->slug)
                                        class="active">{{ $category->name }}
                                        @else
                                            ><a href="{{ route('front.news.category_index', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @if($news->excerpt)
                            <div class="intro-news">{{ $news->excerpt }}</div>
                            @endif
                        </div>
                        {!! $news->content !!}
                    </div>
                    <div class="aside-news">
                        <div class="share-panel">
                            <button class="btn-share btn-whatsapp">Whatsapp</button>
                            <button class="btn-share btn-telegram">Telegram</button>
                            <button class="btn-share btn-facebook">Facebook</button>
                            <button class="btn-share btn-vk">VK</button>
                            <button class="btn-share btn-insta">Instagram</button>
                        </div>
                        @if($latest_news->count() > 0)
                        <div class="last-news">
                            <h3>Свежие статьи</h3>
                            @foreach($latest_news as $latest_new)
                            <div class="last-news-box">
                                <div class="image">
                                    <a href="{{ route('front.news.show', ['slug' => $latest_new->slug]) }}">
                                        <img src="/storage/{{ $latest_new->img }}" alt="">
                                    </a>
                                </div>
                                <div class="desc">
                                    <div class="title">
                                        <a href="{{ route('front.news.show', ['slug' => $latest_new->slug]) }}">{{ mb_strimwidth(strip_tags($latest_new->name), 0, 100, '...') }}</a>
                                    </div>
                                    <div class="info">
                                        <div>{{ (new DateTime($latest_new->updated_at))->format('d.m.Y') }}</div>
                                        <div class="time">{{ $latest_new->read_time }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="news-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="menu">
                        @foreach($categories as $category)
                        <li><a href="{{ route('front.news.category_index', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                    <div class="wrapper">
                        @foreach($random_news as $random_new)
                        <div class="news-box">
                            <div class="info">
                                <div class="date">{{ (new DateTime($random_new->updated_at))->format('d.m.Y') }}</div>
                                <div class="time">{{ $random_new->read_time }}</div>
                            </div>
                            <div class="title"><a href="{{ route('front.news.show', ['slug' => $random_new->slug]) }}">{{ $random_new->name }}</a></div>
                            <div class="desc">{{ mb_strimwidth(strip_tags($latest_new->excerpt), 0, 100, '...') }}</div>
                        </div>
                        @endforeach
                        <a href="{{ route('front.news.index') }}" class="btn btn-indigo btn-all-news-mobile">Смотреть все новости</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
