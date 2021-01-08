@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
    <section class="page-404">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="big">404</div>
                    <div class="medium">Страница не существует</div>
                    <p>Возможно она была удалена, или перенесена в другое место.<br /> Вернитесь на главную страницу и попробуйте найти её вручную</p>
                    <a href="/" class="btn btn-indigo">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
