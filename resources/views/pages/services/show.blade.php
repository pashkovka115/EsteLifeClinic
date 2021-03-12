@extends('layouts.index')

@section('title')
    {{ $service->title }}
@endsection
@section('meta_description')
    {{ $service->meta_description }}
@endsection

@section('content')
    <section class="action-page-main-block service-page-main-block" style="background-image: url('/storage/{{ $service->img }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @if($service->actions->count() > 0)
                    <div class="date">
                        {{ (new DateTime($service->actions[0]->start))->format('d.m.Y') }} - {{ (new DateTime($service->actions[0]->finish))->format('d.m.Y') }}
                    </div>
                    @endif
                    <div class="program-title">
                        <p>Процедура</p>
                        <p class="big">«{{ $service->name }}»</p>
                    </div>
                    @if($service->price)
                        <div class="discount-program">
                            <p class="big">{{ $service->price }}</p>
                        </div>
                    @elseif($service->actions->count() > 0)
                        <div class="discount-program">
                            @php
                            $arr = [];
                            foreach ($service->actions as $act){
                                if ($act->discount){
                                    $arr[] = $act->discount * 1;
                                }
                            }
                            @endphp

                            @if(count($arr) > 0)
                            <p>Со скидкой</p>
                            <p class="big">От {{ min($arr) }}</p>
                            @endif
                        </div>
                        <a href="{{ route('front.actions.show', ['slug' => $service->actions[0]->slug]) }}" target="_blank" class="btn btn-indigo">Подробнее об акции</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="serv-page">
        <div class="container">
            <div class="row">
                {{--<div class="col-lg-12">
                    <div class="crumbs">
                        <ol>
                            <li><a href="">Все акции</a></li>
                            <li>Программа обследования «Мужчины 40+»</li>
                        </ol>
                    </div>
                </div>--}}
                @if($service->short_description)
                <div class="col-lg-9">
                    {!! $service->short_description !!}
                </div>
                @endif
                <div class="col-lg-3">
                    <div class="btn-wrap-serv">
                        <a href="#order" class="btn btn-indigo popup-with-form">Записаться на процедуру</a>
                        <a href="#price" class="btn btn-border-indigo">Посмотреть стоимость</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="icon-block">
        <div class="container">
            <div class="row">
                @if($service->description)
                <div class="col-lg-6">
                    {!! $service->description !!}
                </div>
                @endif
                <div class="col-lg-6">
                    <div class="icon-wrap">
                        @if($service->ico1 or $service->service1)
                            <div class="item">
                                <div class="icn"><img src="/storage/{{ $service->ico1 }}" alt=""></div>
                                <p>{{ $service->service1 }}</p>
                            </div>
                        @endif
                        @if($service->ico2 or $service->service2)
                            <div class="item">
                                <div class="icn"><img src="/storage/{{ $service->ico2 }}" alt=""></div>
                                <p>{{ $service->service2 }}</p>
                            </div>
                        @endif
                        @if($service->ico3 or $service->service3)
                            <div class="item">
                                <div class="icn"><img src="/storage/{{ $service->ico3 }}" alt=""></div>
                                <p>{{ $service->service3 }}</p>
                            </div>
                        @endif
                        @if($service->ico4 or $service->service4)
                            <div class="item">
                                <div class="icn"><img src="/storage/{{ $service->ico4 }}" alt=""></div>
                                <p>{{ $service->service4 }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($category->services->count() > 0)
    <section id="price" class="price-list-block price-list-block-serv">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $category->name }}</h2>
                    <div class="price-list-item">
                        <div class="right">
                            @foreach($service->prices as $price)
                            <div class="service-item">
                                <div class="title">{{ $price->name }}</div>
                                <div class="price">{{ $price->price }}</div>
                                <div class="order"><a href="#order" class="btn btn-indigo popup-with-form">Записаться на прием</a></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($service->treatment_history->count() > 0)
    <section class="before-after-page before-after-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title title-mini">До/После {{ $service->treatment_history[0]->service->name }} <a href="{{ route('front.before_after.index') }}" target="_blank">Больше примеров</a></h2>
                    <div class="wrapper">
                        <div class="before-after-box before-after-box-50">
                            <div class="image twentytwenty-container">
                                <img src="/storage/{{ $service->treatment_history[0]->before_images }}" alt="">
                                <img src="/storage/{{ $service->treatment_history[0]->after_images }}" alt="">
                                <span class="label label-before">До</span>
                                <span class="label label-after">После</span>
                            </div>
                            <div class="title">{{ $service->treatment_history[0]->service->name }} {{ (new DateTime($service->treatment_history[0]->done))->format('d.m.Y') }}. Врач {{ $service->treatment_history[0]->doctor->name }}</div>
                            <div class="desc">{{ $service->treatment_history[0]->description }}</div>
                        </div>
                        @isset($service->treatment_history[1])
                            <div class="before-after-box before-after-box-50">
                                <div class="image twentytwenty-container">
                                    <img src="/storage/{{ $service->treatment_history[1]->before_images }}" alt="">
                                    <img src="/storage/{{ $service->treatment_history[1]->after_images }}" alt="">
                                    <span class="label label-before">До</span>
                                    <span class="label label-after">После</span>
                                </div>
                                <div class="title">{{ $service->treatment_history[1]->service->name }} {{ (new DateTime($service->treatment_history[1]->done))->format('d.m.Y') }}. Врач {{ $service->treatment_history[1]->doctor->name }}</div>
                                <div class="desc">{{ $service->treatment_history[1]->description }}</div>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($doctors->count() > 0)
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
                            <div class="image">@if($doctor->img)<img src="/storage/{{ $doctor->img }}" alt="">@endif</div>
                            <div class="desc">
                                <div class="title">{{ $doctor->name }}</div>
                                <div class="pos">
                                    @php
                                    $str = '';
                                    foreach ($doctor->professions as $profession){
                                        $str .= $profession->name . ', ';
                                    }
                                    echo rtrim($str, ', ');
                                    @endphp
                                </div>
                                @if($doctor->jobs->count() > 2)
                                    <?php
                                    $jobs = $doctor->jobs->toArray();

                                    $start = \Carbon\Carbon::create($jobs[0]['start']);
                                    $end = \Carbon\Carbon::create(array_pop($jobs)['end']);
                                    $diff = $start->diffInYears($end);
                                    ?>
                                    <div class="stage"><b>{{ $diff }} {{ Lang::choice('год|года|лет', $diff) }}</b> Стаж работы</div>
                                @endif
                            </div>
                            <a href="{{ route('front.doctors.show', ['slug' => $doctor->slug]) }}" class="overlay"></a>
                        </div>
                        @endforeach
                        <a href="{{ route('front.doctors.index') }}" class="more-doc-link"><span>Подробнее обо всех врачах</span></a>
                    </div>
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
                        @foreach($latest_news as $new)
                        <div class="news-box">
                            <div class="info">
                                <div class="date">{{ (new DateTime($new->updated_at))->format('d.m.Y') }}</div>
                                <div class="time">{{ $new->read_time }}</div>
                            </div>
                            <div class="title"><a href="">{{ $new->name }}</a></div>
                            <div class="desc">{{ mb_strimwidth(strip_tags($new->excerpt), 0, 110, '...') }}</div>
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
