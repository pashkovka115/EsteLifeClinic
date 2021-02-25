@extends('layouts.index')

@section('title')
    @if(Route::current()->getName() == 'front.doctors.index')
        Все врачи
    @else
        {{ $doctors[0]->professions[0]->name ?? '' }}
    @endif
@endsection

@section('content')
    <section class="doctor-list-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="crumbs">
                        <ol>
                            <li><a href="/">Главная</a></li>
                            @if(Route::current()->getName() == 'front.doctors.index')
                            <li>Все врачи</li>
                            @else
                                <li><a href="{{ route('front.doctors.index') }}">Все врачи</a></li>
                                <li>Врачи по специальности</li>
                            @endif
                        </ol>
                    </div>
                    <h1 class="title">Врачи</h1>
                    <ul class="menu">
                        @if($doctors->count() > 0)
                        <li class="{{ active('front.doctors.index') }}"><a href="{{ route('front.doctors.index') }}">Все врачи</a></li>
                        @else
                            <p>Нет содержания для отображения</p>
                        @endif
                        @foreach($professions as $profession)
                            <?php
                            $active = '';
                            if(count(Route::current()->parameters()) > 0){
                                $params = Route::current()->parameters();
                                if (isset($params['profession'])){
                                    if ($params['profession'] == $profession->slug)
                                    $active = ' active';
                                }
                            }
                            ?>
                        <li class="{{ $active }}">
                            <a href="{{ route('front.doctors.professions', ['profession' => $profession->slug]) }}">{{ $profession->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="wrapper-doc-list-page">
                        @foreach($doctors as $doctor)
                            <div class="doc-card">
                                @if($doctor->img)
                                    <div class="image"><img src="/storage/{{ $doctor->img }}" alt=""></div>
                                @endif
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
                                        <div class="stage"><b>{{ $diff }} {{ Lang::choice('год|года|лет', $diff) }}</b> Стаж работы</div>
                                    @endif
                                </div>
                                <a href="{{ route('front.doctors.show', ['slug' => $doctor->slug]) }}" class="overlay"></a>
                            </div>
                        @endforeach

                    </div>
                    @if($doctors->count() > 0)
                    <div class="text-center">
                        <a id="del_btn" href="#" data-page="2" class="btn btn-indigo btn-more-doctors">Смотреть еще</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')
    @if(isset($slug))
        <script>
            var url = "{{ route('front.doctors.professions.ajax', ['profession' => $slug]) }}";
            var slug = "{{ $slug }}";
        </script>
    @else
        <script>
            var url = "{{ route('front.doctors.index.ajax') }}";
            var slug = "";
        </script>
    @endif
    <script>
        $( document ).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $( "#del_btn" ).on('click', function(e){
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: url  + '?page=' + $('#del_btn').attr('data-page'),
                    data: {
                        slug: slug
                    },
                    success: function ( msg ) {
                        $('.wrapper-doc-list-page').append(msg);
                        var new_page = parseInt($('#del_btn').attr('data-page')) + 1;
                        $('#del_btn').attr('data-page', new_page);
                        if (msg === ''){
                            $('#del_btn').parent().remove();
                        }
                    }
                })
            });
        });
    </script>
@endsection






























