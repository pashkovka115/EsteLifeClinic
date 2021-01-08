@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
    @if($home->top_sliders)
    @if($home->top_sliders->visibility == '1')
    <section class="slider-block">
        <div class="slider">
            @foreach($home->top_sliders->items as $item)
            <div class="item">
                <img src="/storage/{{ $item->img }}" alt="">
            </div>
            @endforeach

            <!--<div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 wrapper-slide">
                            <div class="left">
                                <h3>Мы заботимся о вашей красоте и здоровье</h3>
                                <div class="ftr">
                                    <p>Мы заботимся о вашей красоте и здоровье. Новое в нашей статье</p>
                                    <a href="" class="btn btn-indigo">Читать статью</a>
                                </div>
                            </div>
                            <div class="right" style="background-image: url(img/slide.png);"></div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
        <div class="slick-dots-main-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12"><div class="slick-dots-custom"></div></div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endif

    @if($home->useful_tips)
    @if($home->useful_tips->visibility == '1')
    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wrapper">
                        <div class="tabs">
                            @foreach($home->useful_tips->items as $item)
                                @if($item->visibility == '1')
                            <span class="tab">{!! $item->extra !!} {!! $item->title !!}</span>
                                @endif
                            @endforeach

                        </div>
                        <div class="tab_content">
                            @foreach($home->useful_tips->items as $item)
                                @if($item->visibility == '1')
                            <div class="tab_item" style="background-image: url('/storage/{{ $item->img }}');">
                                <div class="mobile-tab">{!! $item->extra !!} {!! $item->title !!}</div>
                                <div class="wrap">
                                    {!! $item->description !!}
                                </div>
                            </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endif

    @if($actions->count() > 0)
    <section class="action-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-block">
                        <h2 class="title">Акции <a href="{{ route('front.actions.index') }}">Все акции</a></h2>
                        <div class="nav-slider">
                            <div class="btn-slider" id="action-slider-prev-btn"><i class="demo-icon icon-arrow-left"></i></div>
                            <div class="sl-count"><span class="sl-count__current">1</span> / <span class="sl-count__total"></span></div>
                            <div class="btn-slider" id="action-slider-next-btn"><i class="demo-icon icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div class="action-slider">
                        @foreach($actions as $action)
                            <?php
                            $start = \Carbon\Carbon::create($action->finish);
                            $end = \Carbon\Carbon::now()->startOfDay();
                            $diff = $start->diffInDays($end);
                            ?>
                        <div class="item">
                            <a href="{{ route('front.actions.show', ['slug' => $action->slug]) }}">
                                @if($action->banner_img)<img src="/storage/{{ $action->banner_img }}" alt="{{ $action->name }}">@endif

                                @if($diff > 3)
                                    <span class="date-label">до {{ (\Carbon\Carbon::createFromFormat('Y-m-d', $action->finish))->formatLocalized('%d %B %Y') }}</span>
                                @else
                                    <span class="date-label date-red">{{ Lang::choice('Остался|Осталось|Осталось', $diff) }} {{ $diff }} {{ Lang::choice('день|дня|дней', $diff) }}!</span>
                                @endif
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
        @endif

    <section class="doctors-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><small>Наши врачи знают,</small><strong>Красота</strong> всегда начинается<br /> изнутри</h2>
                    <div class="wrapper">
                        @foreach($doctors as $doctor)
                        <div class="doc-card">
                            @if($doctor->level == '1')
                            <div class="label"><i class="demo-icon icon-star"></i> <span>Врач высшей категории</span></div>
                            @endif
                            <div class="image"><img src="/storage/{{ $doctor->img }}" alt="{{ $doctor->name }}"></div>
                            <div class="desc">
                                <div class="title">{{ $doctor->name }}</div>
                                @foreach($doctor->professions as $profession)
                                <div class="pos">{{ $profession->name }}</div>
                                @endforeach
                                @if($doctor->jobs->count() > 2)
                                    <?php
                                    $jobs = $doctor->jobs->toArray();

                                    $start = \Carbon\Carbon::create($jobs[0]['start']);
                                    $end = \Carbon\Carbon::create(array_pop($jobs)['end']);
                                    $diff = $start->diffInYears($end);
                                    ?>
                                    <div class="stage"><b>{{ $diff }} {{ Lang::choice('год|года|лет', $diff) }}</b> Стаж работы
                                    </div>
                                @endif

                            </div>
                            <a href="{{ route('front.doctors.show', ['slug' => $doctor->slug]) }}" class="overlay"></a>
                        </div>
                        @endforeach

                        <a href="{{ route('front.doctors.index') }}" class="more-doc-link"><span>Подробнее обо всех врачах</span></a>
                    </div>
{{--                    <p class="footnote"><span class="star"></span>Врач высшей категории</p>--}}
                </div>
            </div>
        </div>
    </section>

    <section>
        @if($home->medical_center_sliders)
        @if($home->medical_center_sliders->visibility == '1')
        <div class="slider-company-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap">
                            {!! $home->medical_center_sliders->description !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="slider-company">
                            @foreach($home->medical_center_sliders->items as $item)
                                @if($item->visibility == '1')
                            <div class="item"><img src="/storage/{{ $item->img }}" alt=""></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-company-nav">
                <div class="btn-wrap">
                    <button class="btn-slider" id="slider-company-prev-btn"><i class="demo-icon icon-arrow-left"></i></button>
                    <button class="btn-slider" id="slider-company-next-btn"><i class="demo-icon icon-arrow-right"></i></button>
                </div>
                <div class="slider-company-thumb">
                    @foreach($home->medical_center_sliders->items as $item)
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
        @endif
        @endif

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

    <section class="banner-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <h2>Мы заботимся о вашей красоте и здоровье!</h2>
                    <p>Оставьте заявку на посещение, и менеджер свяжется с вами в ближайшее время.</p>
                    <a href="#callback" class="btn btn-indigo popup-with-form">Оставить заявку</a>
                </div>
            </div>
        </div>
    </section>
    <section class="news-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title">Новости <a href="{{ route('front.news.index') }}">Все новости</a></h2>
                    <div class="wrapper">
                        @foreach($posts as $post)
                        <div class="news-box">
                            <div class="info">
                                <div class="date">{{ (new DateTime($post->updated_at))->format('d.m.Y') }}</div>
                                <div class="time">{{ $post->read_time }}</div>
                            </div>
                            <div class="title"><a href="">{{ $post->title }}</a></div>
                            <div class="desc">{{ mb_strimwidth(strip_tags($post->content), 0, 110, '...') }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
