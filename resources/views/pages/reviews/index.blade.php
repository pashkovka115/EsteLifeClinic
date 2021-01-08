@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
    <section class="reviews-list-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="crumbs">
                        <ol>
                            <li><a href="">Все акции</a></li>
                            <li>Программа обследования «Мужчины 40+»</li>
                        </ol>
                    </div>
                    <h1 class="title">Отзывы</h1>
                    <ul class="menu">
                        <li class="{{ active('front.reviews') }}"><a href="{{ route('front.reviews') }}">Все отзывы</a>
                        </li>
                        @foreach($categories as $category)
                            <?php
                            $active = '';
                            if (isset(Route::current()->parameters()['cat_id'])) {
                                if (Route::current()->parameters()['cat_id'] == $category->id) {
                                    $active = 'active';
                                }
                            }
                            ?>
                            <li class="{{ $active }}"><a
                                    href="{{ route('front.reviews.show', ['cat_id' => $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div id="add_content" class="wrapper">
                        @foreach($reviews as $review)
                            <div class="review-box">
                                <div class="author">{{ $review->name }}</div>
                                <div class="cat">Направление: {{ $review->category->name }}</div>
                                <p>{{ $review->content }}</p>
                                <div class="date">{{ (new DateTime($review->updated_at))->format('d.m.Y H:i') }}</div>
                            </div>
                            @if($loop->first)
                                <div class="review-box review-thanks-form">
                                    <h3>Большое спасибо за вашу обратную связь!</h3>
                                    <a href="#review-form" class="btn btn-indigo popup-with-form">Оставить отзыв</a>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="text-center" style="margin-top: 20px">
                        <button id="del_btn" data-page="2" class="btn btn-indigo">Смотреть еще</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')
    @if(isset($cat_id))
        <script>
            var cat_id = {{ $cat_id }};
            var url = "{{ route('front.reviews.show_ajax', ['cat_id' => $cat_id]) }}";
        </script>
    @else
        <script>
            var cat_id = null;
            var url = "{{ route('front.reviews_ajax') }}";
        </script>
    @endif
    <script>

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#del_btn").on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    method: "POST",
                    url: url + '?page=' + $('#del_btn').attr('data-page'),
                    data: {},
                    success: function (msg) {
                        $('#add_content').append(msg);
                        var new_page = parseInt($('#del_btn').attr('data-page')) + 1;
                        $('#del_btn').attr('data-page', new_page);
                        if (msg === '') {
                            $('#del_btn').parent().remove();
                        }
                    }
                })
            });
        });
    </script>
@endsection
