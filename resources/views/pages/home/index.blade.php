@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
{{--    @if($home->top_sliders)--}}
{{--    @if($home->top_sliders->visibility == '1')--}}
    <section class="slider-block">
        <div class="slider">
{{--            @foreach($home->top_sliders->items as $item)--}}
            @foreach($top_slider as $item)
            <div class="item">
                @if($item->img)
                <img src="/storage/{{ $item->img }}" alt="" style="max-height: 563px; width: auto;">
                @endif
            </div>
            @endforeach

        </div>
        <div class="slick-dots-main-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12"><div class="slick-dots-custom"></div></div>
                </div>
            </div>
        </div>
    </section>
{{--    @endif--}}
{{--    @endif--}}

<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper">
                    <div class="tabs">
                        <span class="tab"><i class="demo-icon icon-doctor"></i> Консультация специалиста</span>
                        @foreach($categories as $category)
                            @if($category->img)
                        <span class="tab"><img src="/storage/{{ $category->img }}" alt="">&nbsp;&nbsp;&nbsp; {{ $category->name }}</span>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab_content">
                        <div class="tab_item" style="background-image: url(img/bg-serv-1.png);">
                            <div class="mobile-tab"><i class="demo-icon icon-doctor"></i> Консультация специалиста</div>
                            <div class="wrap">
                                <h3>В 100% случаев</h3>
                                <p><strong>Необходима предварительная консультация специалиста для правильного назначения лечения/процедуры.</strong></p>
                                <p><strong>Самодиагностика зачастую приводит к неожиданным результатам.</strong></p>
                                <a href="#order" class="btn btn-indigo popup-with-form">Записаться на прием</a>
                            </div>
                        </div>

                        @foreach($categories as $category)
                        <div class="tab_item" @if($category->bg_img) style="background-image: url('/storage/{{ $category->bg_img }}');" @endif>
                            <div class="mobile-tab"><i class="demo-icon icon-laser"></i> Лазерная косметология</div>
                            <div class="wrap">
                                <div class="ul-wrap">
                                    <ul>
                                        @foreach($category->services as $service)
                                        <li><a href="{{ route('front.service.show', ['slug' => $service->slug]) }}" target="_blank">{{ $service->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="#order" class="btn btn-indigo popup-with-form">Записаться на прием</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

                                @if($diff > 3 and !is_null($action->finish))
                                    <span class="date-label">до {{ (\Carbon\Carbon::createFromFormat('Y-m-d', $action->finish))->formatLocalized('%d %B %Y') }}</span>
                                @elseif(!is_null($action->finish))
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
                            <div class="image">
                                @if($doctor->img)
                                <img src="/storage/{{ $doctor->img }}" alt="{{ $doctor->name }}">
                                @endif
                            </div>
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
        <div class="slider-company-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="wrap">
                            {!! $about_us_description->full_description !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="slider-company">
                            @foreach($about_us_slider as $item)
                            <div class="item">
                                @if($item->img)
                                <img src="/storage/{{ $item->img }}" alt="">
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if($about_us_slider->count() > 0)
            <div class="slider-company-nav">
                <div class="btn-wrap">
                    <button class="btn-slider" id="slider-company-prev-btn"><i class="demo-icon icon-arrow-left"></i></button>
                    <button class="btn-slider" id="slider-company-next-btn"><i class="demo-icon icon-arrow-right"></i></button>
                </div>
                <div class="slider-company-thumb">
                    @foreach($about_us_slider as $item)
                    <div class="item">
                        <i class="demo-icon icon-doctor"></i>
                        <p>{{ $item->title }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="slick-dots-custom2"></div>

            </div>
            @endif
        </div>

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
                            <div class="title"><a href="{{ route('front.news.show', ['slug' => $post->slug]) }}">{{ $post->name }}</a></div>
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
