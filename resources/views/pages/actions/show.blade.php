@extends('layouts.index')

@section('title') {{ $action->title ?? env('APP_NAME') }} @endsection
@section('meta_description') {{ $action->meta_description }} @endsection

@section('content')
    <section class="action-page-main-block" style="background-image: url('/storage/{{ $action->big_img }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @php
                    $end_action_time = new DateTime($action->finish);
                    @endphp
                    <div class="date">{{ (new DateTime($action->start))->format('d.m.Y') }} - {{ $end_action_time->format('d.m.Y') }}</div>
                    @if((new DateTime("now")) > $end_action_time)
                        <div class="date" style="color: red">Акция завершена</div>
                    @endif
                    <div class="program-title">
                        <p>{{ $action->type }}</p>
                        <p class="big">{{ $action->name }}</p>
                    </div>
                    <div class="discount-program">
                        <p>Со скидкой</p>
                        <p class="big">{{ $action->discount }}</p>
                    </div>
                    <a href="" class="btn btn-indigo">Участвовать в акции</a>
                    <img src="img/mobile-action.png" class="mobile-action-image" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="action-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="crumbs">
                        <ol>
                            <li><a href="{{ route('front.actions.index') }}">Все акции</a></li>
                            <li>{{ $action->type }} {{ $action->name }}</li>
                        </ol>
                    </div>
                    <h1>{{ $action->slogan }}</h1>
                    <div class="action-date">
                        <h4>Акция проводится:</h4>
                        <p>{{ (new DateTime($action->start))->format('d.m.Y') }} - {{ (new DateTime($action->finish))->format('d.m.Y') }}</p>
                    </div>
                    {!! $action->description !!}
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="action-menu">
                        @if($action->conditions)
                        <h3>Условия акции:</h3>
                        {!! $action->conditions !!}
                        @endif
                        <a href="" class="btn btn-indigo">Участвовать в акции</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($all_actions->count() > 0)
    <section class="action-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-block">
                        <h2 class="title">Акции <a href="">Все акции</a></h2>
                        <div class="nav-slider">
                            <div class="btn-slider" id="action-slider-prev-btn"><i class="demo-icon icon-arrow-left"></i></div>
                            <div class="sl-count"><span class="sl-count__current">1</span> / <span class="sl-count__total"></span></div>
                            <div class="btn-slider" id="action-slider-next-btn"><i class="demo-icon icon-arrow-right"></i></div>
                        </div>
                    </div>
                    <div class="action-slider">
                        @foreach($all_actions as $act)
                            @if(!is_null($act->banner_img) and $act->banner_img != '')
                        <div class="item">
                            <a href="{{ route('front.actions.show', ['slug' => $act->slug]) }}">
                                <img src="/storage/{{ $act->banner_img }}" alt="{{ $act->name }}">
                            </a>
                        </div>
                            @endif
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
