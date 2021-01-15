@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
    <section class="action-all-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-top: 40px">
                    <h1 class="title">Акции</h1>
                    <div class="wrapper">
                        @foreach($actions as $action)
                            <?php
                            $start = \Carbon\Carbon::create($action->finish);
                            $end = \Carbon\Carbon::now()->startOfDay();
                            $diff = $start->diffInDays($end);
                            ?>
                        <div class="action-box">
                            <div class="image">
                                <a href="{{ route('front.actions.show', ['slug' => $action->slug]) }}">
                                    <img src="storage/{{ $action->banner_img }}" alt="">
                                    @if($diff > 3)
                                    <span class="date-label">до {{ (\Carbon\Carbon::createFromFormat('Y-m-d', $action->finish))->formatLocalized('%d %B %Y') }}</span>
                                    @else
                                        <span class="date-label date-red">{{ Lang::choice('Остался|Осталось|Осталось', $diff) }} {{ $diff }} {{ Lang::choice('день|дня|дней', $diff) }}!</span>
                                    @endif
                                </a>
                            </div>

                            <div class="date">Акция проводится с {{ (new DateTime($action->start))->format('d.m.Y') }} по {{ (new DateTime($action->finish))->format('d.m.Y') }}</div>
                            <div class="desc">{{ $action->short_description }}</div>
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
