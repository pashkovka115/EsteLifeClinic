@extends('admin.layouts.app')

@section('title', 'Редактируем услугу')

@section('pageName', 'Редактируем услугу')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.price.service.all_services') }}">Цены</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.price.direction.index') }}">Направления</a></li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.price.category.index', ['direction_id' => $service->category->direction->id]) }}">{{ $service->category->direction->name }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.price.service.index', ['category_id' => $service->category->id]) }}">{{ $service->category->name }}</a>
    </li>
    <li class="breadcrumb-item active">Редактируем услугу</li>
@endsection

@section('headerStyle')

@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.price.service.update', ['id' => $service->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Наименование</label>
                <input class="form-control" type="text" name="name" value="{{ $service->name }}">
            </div>
            <div class="form-group">
                <label>Категория</label>
                <select class="form-control" name="pricedirection_id">
                    @foreach($categories as $category)
                        <?php
                        if ($category->id == $service->category->id){
                            $selected = ' selected';
                        }else{ $selected = ''; }
                        ?>
                        <option value="{{ $category->id }}"{{ $selected }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>

@stop

