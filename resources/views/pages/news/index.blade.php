@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
    <section class="news-list-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {{--<div class="crumbs">
                        <ol>
                            <li><a href="">Все акции</a></li>
                            <li>Программа обследования «Мужчины 40+»</li>
                        </ol>
                    </div>--}}
                    <h1 class="title">Новости</h1>
                        <ul class="menu">
                            @if($categories->count() > 1)
                            <li class="{{ active('front.news.index') }}"><a href="{{ route('front.news.index') }}">Все новости</a></li>
                            @endif
                            @foreach($categories as $category)
                                @if($category->posts->count() > 0)
                            <li><a href="{{ route('front.news.category_index', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                                    @endif
                            @endforeach
                        </ul>
                        <div id="add_content" class="wrapper">
                            @foreach($news as $new)
                            <div class="news-box">
                                <div class="image"><a href="{{ route('front.news.show', ['slug' => $new->slug]) }}"><img src="/storage/{{ $new->img }}" alt=""></a></div>
                                <div class="wrap">
                                    <div class="info">
                                        <div class="date">{{ (new DateTime($new->updated_at))->format('d.m.Y') }}</div>
                                        <div class="time">{{ $new->read_time }}</div>
                                    </div>
                                    <div class="title"><a href="{{ route('front.news.show', ['slug' => $new->slug]) }}">{{ $new->name }}</a></div>
                                    <div class="desc">{{ mb_strimwidth(strip_tags($new->excerpt), 0, 100, '...') }}</div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    @if($news->count() > 0)
                        <div class="text-center">
                            <button id="more_news" data-page="2" class="btn btn-indigo">Смотреть еще</button>
                        </div>
                    @else
                        <p>Нет новостей</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')
    <script>
        var url = "{{ route('front.news.ajax') }}";

        $( document ).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $( "#more_news" ).on('click', function(e){
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: url  + '?page=' + $('#more_news').attr('data-page'),
                    data: {

                    },
                    success: function ( msg ) {
                        $('#add_content').append(msg);
                        var new_page = parseInt($('#more_news').attr('data-page')) + 1;
                        $('#more_news').attr('data-page', new_page);
                        if (msg === ''){
                            $('#more_news').parent().remove();
                        }
                    }
                })
            });
        });
    </script>
@endsection
