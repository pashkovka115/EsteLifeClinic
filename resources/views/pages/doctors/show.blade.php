@extends('layouts.index')

@section('title') {{ $doctor->title ?? $doctor->name }} @endsection
@section('meta_description') {{ $doctor->meta_description }} @endsection

@section('header_style')

@endsection

@section('content')
    <section class="doctor-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="crumbs">
                        <ol>
                            <li><a href="/">Главная</a></li>
                            <li><a href="{{ route('front.doctors.index') }}">Все врачи</a></li>
                            <li>Врач {{ $doctor->name }}</li>
                        </ol>
                    </div>
                    <h1 class="title">Врачи</h1>
                    <ul class="menu">
                        <li class="{{ active('front.doctors.index') }}"><a href="{{ route('front.doctors.index') }}">Все врачи</a></li>
                        @foreach($professions as $profession)
                            <?php
                            $active = '';
                            foreach ($doctor->professions as $prof){
                                if ($prof->slug == $profession->slug){
                                    $active = ' active';
                                    break;
                                }
                            }
                            ?>
                            <li class="{{ $active }}">
                                <a href="{{ route('front.doctors.professions', ['profession' => $profession->slug]) }}">{{ $profession->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="wrapper-doc-page">
                        <div class="doc-list">
                            <div class="sticky">
                                @foreach($doctor_all as $doc)
                                    <?php
                                    $act = '';
                                    if($doc->id == $doctor->id){
                                        $act = ' active';
                                    } ?>
                                        <div class="item{{ $act }}">
                                            <div class="image">
                                                @if($doc->img)
                                                <a href="{{ route('front.doctors.show', ['slug' => $doc->slug]) }}">
                                                    <img src="/storage/{{ $doc->img }}" alt="">
                                                </a>
                                                @endif
                                                @if($doc->level == '1')
                                                <span class="label"><i class="demo-icon icon-star"></i></span>
                                                @endif
                                            </div>
                                            <div class="desc">
                                                <div class="title"><a href="{{ route('front.doctors.show', ['slug' => $doc->slug]) }}">{{ $doc->name }}</a></div>
                                                <div class="pos"><?php
                                                    $a = [];
                                                    foreach ($doc->professions as $prof){
                                                        array_push($a, $prof->name);
                                                    }
                                                    echo implode(',', $a);
                                                    ?></div>
                                            </div>
                                        </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="doc-page">
                            <div class="image">
                                @if($doctor->img)
                                <img src="/storage/{{ $doctor->img }}" alt="">
                                @endif
                            </div>
                            <div class="info-doctor">
                                @if($doctor->level == '1')
                                <div class="high-cat">Врач высшей категории</div>
                                @endif
                                <h1>{{ $doctor->name }}</h1>
                                    @if($doctor->jobs->count() > 2)
                                        <?php
                                        $jobs = $doctor->jobs->toArray();

                                        $start = \Carbon\Carbon::create($jobs[0]['start']);
                                        $end = \Carbon\Carbon::create(array_pop($jobs)['end']);
                                        $diff = $start->diffInYears($end);
                                        ?>
                                        <div class="stage">Стаж работы: <b>{{ $diff }} {{ Lang::choice('год|года|лет', $diff) }}</b></div>
                                    @endif
                                    @if($doctor->professions->count() > 0)
                                <div class="spec">Специализация: <b>
                                        <?php
                                        $arr = [];
                                        foreach( $doctor->professions as $profession ){
                                            array_push($arr, $profession->name);
                                        }
                                        echo implode(',', $arr);
                                        ?>
                                    </b>
                                </div>
                                    @endif
                                <div class="btn-wrap">
                                    <a href="#order" data-doctor-id="{{ $doctor->id }}" onclick="setDoctor(this)" class="btn btn-indigo popup-with-form">Записаться на прием</a>
                                    <a id="doctor_online" data-doctor="{{ $doctor->id }}" href="#online" class="btn btn-border-indigo popup-with-form">Онлайн-консультация</a>
                                </div>
                            </div>
                            <div class="education info-doc-item">
                                <div class="row">
                                    @if($doctor->education)
                                    <div class="col-lg-6">
                                        <h4>Образование:</h4>
                                        {!! $doctor->education !!}
                                    </div>
                                    @endif
                                    @if($doctor->add_education)
                                    <div class="col-lg-6">
                                        <h4>Дополнительное образование:</h4>
                                        <div id="text_add_education_before"></div>
                                        <div id="text_add_education_after" style="display: none"></div>
{{--                                        {!! $doctor->add_education !!}--}}
{{--                                        <a id="read_more" href="#" class="more">Читать дальше...</a>--}}
                                    </div>
                                        @endif
                                </div>
                            </div>
                            @if($doctor->add_education)
                            <?php $json_text = json_encode(['text' => $doctor->add_education], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);  ?>
                            <script>
                                var text = {!! $json_text !!};
                                var sp = text.text.split('<!-- pagebreak -->');

                                if (sp[0] !== undefined){
                                    document.querySelector('#text_add_education_before').innerHTML = sp[0];
                                }
                                if (sp[1] !== undefined){
                                    var el = document.querySelector('#text_add_education_after');
                                    el.innerHTML = sp[1];
                                    el.insertAdjacentHTML('afterend', ' <a id="read_more" href="#" class="more">Читать дальше...</a>');
                                    console.log(el.innerHTML)
                                }

                                var read_more = document.querySelector('#read_more');
                                if (read_more !== undefined && read_more !== null){
                                    read_more.addEventListener('click', function (e){
                                        e.preventDefault();
                                        var toggle_display = document.querySelector('#text_add_education_after');
                                        var actualDisplay = getComputedStyle(toggle_display).display;
                                        if (actualDisplay === 'none') {
                                            toggle_display.style.display = 'block';
                                        } else {
                                            toggle_display.style.display = 'none';
                                        }
                                    });
                                }
                            </script>
                            @endif
                            @if($doctor->interests->count() > 0)
                            <div class="interests info-doc-item">
                                <h4>Сферы практических интересов:</h4>
                                <div class="wrap">
                                    @foreach($doctor->interests as $interest)
                                    <div class="item">
                                        <div class="icn"><img src="/storage/{{ $interest->ico }}" alt=""></div>
                                        <p>{{ $interest->description }}</p>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            @endif
                            <div class="education info-doc-item">
                                <div class="row">
                                    @if($doctor->professional_awards)
                                        <div class="col-lg-6">
                                            <h4>Профессиональные награды:</h4>
                                            {!! $doctor->professional_awards !!}
                                        </div>
                                    @endif
                                    @if($doctor->medical_associations)
                                        <div class="col-lg-6">
                                            <h4>Медицинские ассоциации:</h4>
                                            {!! $doctor->medical_associations !!}
                                        </div>
                                    @endif
                                    {{--<div class="col-lg-12">
                                        <div class="hidden-part">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, magnam amet laborum alias quaerat laudantium numquam necessitatibus, id veniam beatae nihil aliquid officia reiciendis perspiciatis atque impedit sed eos, ducimus.
                                        </div>
                                        <button class="more">Смотреть</button>
                                    </div>--}}
                                </div>
                            </div>
                            @if($doctor->jobs->count() > 0)
                            <div class="experience info-doc-item">
                                <h4>Опыт работы:</h4>
                                <div class="table-wrap">
                                    <table>
                                        @foreach($doctor->jobs as $job)
                                        <tr>
                                            <td>
                                                @if($job->start and $job->end)
                                                {{ date('Y', $job->start->timestamp) }} - {{ date('Y', $job->end->timestamp) }}
                                                @endif
                                            </td>
                                            <td>{{ $job->position }}</td>
                                            <td>{{ $job->place }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <button class="table-expand">Раскрыть таблицу</button>
                                </div>
                            </div>
                            @endif
                            @if($doctor->services->count() > 0)
                            <div class="services-list info-doc-item">
                                <h4>Услуги:</h4>
                                @foreach($doctor->services as $service)
                                <div class="service-item">
                                    <div class="title">
                                        <a style="color: #000000" href="{{ route('front.service.show', ['slug' => $service->slug]) }}">{{ $service->name }}</a>
                                    </div>
{{--                                    <div class="price">{{ round($service->price) }} ₽</div>--}}
                                    <div class="order">
                                        <a href="#order" data-doctor-id="{{ $doctor->id }}" data-service-id="{{ $service->id }}" onclick="setService(this); setDoctor(this);" class="btn btn-indigo popup-with-form">Записаться на прием</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
