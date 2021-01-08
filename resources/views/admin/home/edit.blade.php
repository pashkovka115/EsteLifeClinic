@extends('admin.layouts.app')

@section('title', 'Домашняя страница')
@section('pageName', 'Домашняя страница')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Домашняя страница</li>
@endsection
@section('headerStyle')

@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.pages.home.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    {{--                    @php(dd($all_banners))--}}
                    <label>Главный баннер</label>
                    <select name="top_slider" class="form-control">
                        @foreach($all_banners as $banner)
                            <?php
                            if ($home->top_sliders and $banner->id == $home->top_sliders->id) {
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $banner->id }}"{{ $selected }}>{{ $banner->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Второй баннер</label>
                    <select name="two_slider" class="form-control">
                        @foreach($all_banners as $banner)
                            <?php
                            if ($home->useful_tips and $banner->id == $home->useful_tips->id) {
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $banner->id }}"{{ $selected }}>{{ $banner->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Выводить слайдов в баннере акций</label>
                    <select name="action_slider" class="form-control">
                        @for($i=0; $i<=30; $i++)
                            <?php
                            if ($home->action_slider == $i){
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $i }}"{{ $selected }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label>Показывать врачей в списке</label>
                    <select name="count_doctors_list" class="form-control">
                        @for($i=3; $i<=23; $i++)
                            <?php
                            if ($home->count_doctors_list == $i){
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $i }}"{{ $selected }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label>Баннер о нас</label>
                    <select name="medical_center_slider" class="form-control">
                        @foreach($all_banners as $banner)
                            <?php
                            if ($home->medical_center_sliders and $banner->id == $home->medical_center_sliders->id) {
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $banner->id }}"{{ $selected }}>{{ $banner->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Показывать последних новостей в списке</label>
                    <select name="count_news" class="form-control">
                        @for($i=1; $i<=12; $i++)
                            <?php
                            if ($home->count_news == $i){
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $i }}"{{ $selected }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>

@stop

@section('footerScript')

@stop
