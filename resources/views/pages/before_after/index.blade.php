@extends('layouts.index')

@section('header_style')
<script>
    var slug = null;
</script>
@endsection

@section('content')
    <section class="before-after-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-top: 40px">
                    <ul class="menu">
                        @if($categories->count() > 0)
                        <li class="{{ active('front.before_after.index') }}"><a href="{{ route('front.before_after.index') }}">Все</a></li>
                    @foreach($categories as $category)
                            <?php
                            $active = '';
                            if(count(Route::current()->parameters()) > 0){
                                $params = Route::current()->parameters();
                                if (isset($params['slug'])){
                                    if ($params['slug'] == $category->slug){
                                        $active = ' active';
                                        echo '<script> slug = "'.$category->slug.'"; </script>';
                                    }
                                }
                            }
                            ?>
                        <li class="{{ $active }}"><a href="{{ route('front.before_after.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>
                        @endforeach
                        @endif
                    </ul>
                    <div id="wrapper-before-after" class="wrapper">
                        <?php
                        $i = 1;
                        $j = 1;
                        foreach($items as $item):
                        if ($j > 5){
                            $i = 1;
                            $j = 1;
                        }
                        if ($i <= 2){
                            $class = 'before-after-box-50';
                        }else{
                            $class = 'before-after-box-33';
                        }
                        ?>
                        <div class="before-after-box {{ $class }}">
                            <div class="image twentytwenty-container">
                                @if($item->before_images)
                                    <img src="/storage/{{ $item->before_images }}" alt="">
                                @endif
                                @if($item->after_images)
                                    <img src="/storage/{{ $item->after_images }}" alt="">
                                @endif
                                <span class="label label-before">До</span>
                                <span class="label label-after">После</span>
                            </div>
                            <div class="title">{{ $item->name }} {{ (DateTime::createFromFormat('Y-m-d', $item->done)->format('d.m.Y')) }}. Косметолог - {{ $item->doctor->name }}</div>
                            <div class="desc">{{ $item->description }}</div>
                        </div>
                        <?php
                            $i++;
                            $j++;
                            endforeach; ?>
                        @if($items->count() == 0)
                            <p>Нет содержания для отображения</p>
                        @endif
                    </div>
                    @if($items->count() > 0)
                    <div class="text-center">
                        <button id="del_btn" data-page="2" class="btn btn-indigo">Смотреть еще</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

    <script>

        var url = "{{ route('front.before_after.ajax') }}";
        // var slug = null;


        $( document ).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if ($( "#del_btn" ).length > 0) {
                $("#del_btn").on('click', function (e) {
                    e.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: url + '?page=' + $('#del_btn').attr('data-page'),
                        data: {
                            slug: slug
                        },
                        success: function (msg) {
                            $('#wrapper-before-after').append(msg);
                            var new_page = parseInt($('#del_btn').attr('data-page')) + 1;
                            $('#del_btn').attr('data-page', new_page);
                            if (msg === '') {
                                $('#del_btn').parent().remove();
                            }
                        }
                    })
                });
            }
        });
    </script>
@endsection
