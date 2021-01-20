@extends('layouts.index')

@section('title') {{ $page->title }} @endsection
@section('meta_description') {{ $page->meta_description }} @endsection

@section('content')
    <section class="news-page" style="margin-bottom: 40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title" style="text-align: center">{{ $page->name }}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="news-content">
                        @if($page->img)
                            <img src="/storage/{{ $page->img }}" alt="{{ $page->name }}"
                                 style="display: inline-block; float: left; margin-right: 16px; margin-bottom: 16px;">
                        @endif
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
