@extends('admin.layouts.app')

@section('title', 'Редактируем условие акции')
@section('pageName', 'Редактируем условие акции')

@section('headerStyle')

@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.content.actions.conditions_actions.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label>Акция</label>
                <select name="action_id" class="form-control form-control-sm">
                    @foreach($actions as $action)
                    <option value="{{ $action->id }}">{{ $action->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Условие акции</label>
                <input class="form-control" name="condition" type="text" value="{{ old('condition') }}" id="example-text-input" required>
            </div>

            <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
        </form>
        </div>
    </div>
</div>

@stop

@section('footerScript')

@stop
