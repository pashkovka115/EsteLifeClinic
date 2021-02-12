@extends('admin.layouts.app')

@section('title', 'Редактируем категорию')
@section('pageName', $category->direction->name . ' / Редактируем категорию')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('admin.price.category.index', ['direction_id' => $category->direction->id]) }}">{{ $category->direction->name }}</a></li>
<li class="breadcrumb-item active">Редактируем категорию</li>
@endsection
@section('headerStyle')

@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.price.category.update', ['id' => $category->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Наименование</label>
                <input class="form-control" type="text" name="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <label>Направление</label>
                <select class="form-control" name="pricedirection_id">
                    @foreach($directions as $direction)
                        <?php
                        if ($direction->id == $category->direction->id){
                            $selected = ' selected';
                        }else{ $selected = ''; }
                        ?>
                    <option value="{{ $direction->id }}"{{ $selected }}>{{ $direction->name }}</option>
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

