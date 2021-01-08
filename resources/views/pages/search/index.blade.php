@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
    <section class="reviews-list-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title">Результаты поиска</h1>
                    <div class="wrapper">
                        @forelse($results as $result)
                            <?php
                            if ($result->table == 'service') {
                                $url = route('front.service.show', ['slug' => $result->slug]);
                            } elseif ($result->table == 'doctor') {
                                $url = route('front.doctors.show', ['slug' => $result->slug]);
                            } else {
                                $url = '';
                            }
                            ?>
                            <div class="review-box">
                                <div class="author"><a href="{{ $url }}" target="_blank">{{ strip_tags($result->name) }}</a></div>
                                <p>{{ mb_strimwidth(strip_tags($result->description), 0, 110, '...') }}</p>
                            </div>
                        @empty
                            <h3>По Вашему запросу ни чего не найдено. Попробуйте изменить запрос.</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
