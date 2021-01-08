@extends('admin.layouts.app')

@section('title', 'Редактируем условие акции')
@section('pageName', 'Редактируем условие акции')

@section('headerStyle')

@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.content.actions.conditions_actions.update', ['id' => $condition->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Условие акции</label>
                <div class="col-sm-12">
                    <input class="form-control" name="condition" type="text" value="{{ $condition->condition }}" id="example-text-input">
                </div>
            </div>

            <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
        </form>

        <div class="form-group mt-3">
            <a href="{{ route('admin.content.actions.conditions_actions.destroy', ['id' => $condition->id]) }}"
               class="bg-danger text-white"
               style="padding: 10px; border-radius: 3px"
               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $condition->id }}').submit(); return false;">
                 <i class="fas fa-trash-alt text-white"></i> Удалить</a>
            <form id="form_{{ $condition->id }}" action="{{ route('admin.content.actions.conditions_actions.destroy', ['id' => $condition->id]) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

@stop

@section('footerScript')

@stop
