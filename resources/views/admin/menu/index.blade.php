@extends('admin.layouts.app')

@section('title', 'Меню')
@section('pageName', 'Редактировать меню')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Редактировать меню</li>
@endsection


@section('headerStyle')
    <style>
        .wrap{
            display: block !important;
        }
    </style>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Menu::render() !!}
        </div>
    </div>
@stop

@section('footerScript')
    {!! Menu::scripts() !!}
@stop
