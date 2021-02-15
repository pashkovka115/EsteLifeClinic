@extends('admin.layouts.app')

@section('title', 'Редактируем направление')
@section('pageName', 'Редактируем направление')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.price.service.all_services') }}">Цены</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.price.direction.index') }}">Направления</a></li>
    <li class="breadcrumb-item active">Редактируем направление</li>
@endsection
@section('headerStyle')

@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.price.direction.update', ['direction' => $direction->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Наименование</label>
                <input class="form-control" type="text" name="name" value="{{ $direction->name }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>

@stop

@section('footerScript')

@stop
