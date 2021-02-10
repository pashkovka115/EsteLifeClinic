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
                    @if(!is_null($service->action_id))
                    <div class="date">
                        {{ (new DateTime($service->action->start))->format('d.m.Y') }} - {{ (new DateTime($service->action->finish))->format('d.m.Y') }}
                    </div>
                    @endif
                    <div class="program-title">
                        <p>Процедура</p>
                        <p class="big">«{{ $service->name }}»</p>
                    </div>
                    @if(!is_null($service->action_id))
                        <div class="discount-program">
                            <p>Со скидкой</p>
                            <p class="big">{{ $service->action->discount }}</p>
                        </div>
                        <a href="{{ route('front.actions.show', ['slug' => $service->action->slug]) }}" target="_blank" class="btn btn-indigo">Подробнее об акции</a>
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
                <div class="col-lg-9">
                    {!! $service->short_description !!}
                </div>
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
                <div class="col-lg-6">
                    {!! $service->description !!}
                </div>
                <div class="col-lg-6">
                    <div class="icon-wrap">
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $service->ico1 }}" alt=""></div>
                            <p>{{ $service->service1 }}</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $service->ico2 }}" alt=""></div>
                            <p>{{ $service->service2 }}</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $service->ico3 }}" alt=""></div>
                            <p>{{ $service->service3 }}</p>
                        </div>
                        <div class="item">
                            <div class="icn"><img src="/storage/{{ $service->ico4 }}" alt=""></div>
                            <p>{{ $service->service4 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="price-list-block price-list-block-serv">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>{{ $category->name }}</h2>
                    <div class="price-list-item">
                        <div class="right">
                            @foreach($category->services as $serv)
                            <div class="service-item">
                                <div class="title">{{ $serv->name }}</div>
                                <div @if($serv->id == $service->id) id="price" @endif class="price">{{ $serv->price }}</div>
                                <div class="order"><a href="#order" class="btn btn-indigo popup-with-form">Записаться на прием</a></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
