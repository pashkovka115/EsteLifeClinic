@extends('admin.layouts.app')

@section('title', 'Настройки')
@section('pageName', 'Редактировать настройку')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Редактировать настройку</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.options.options.update', ['option' => $option->id]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label for="text-input-name">Ключ</label>
                            <input class="form-control" type="text" value="{{ $option->key }}"
                                   id="text-input-name" disabled>
                            <input type="hidden" name="key" value="{{ $option->key }}">
                        </div>

                        <div class="form-group">
                            <label>Значение</label>
                            <textarea class="form-control" name="val">{{ $option->val }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="text-input-name">Дополнительное значение</label>
                            <input class="form-control" name="val2" type="text" value="{{ $option->val2 }}"
                                   id="text-input-name">
                        </div>

                        <div class="form-group">
                            <label for="text-input-name">Краткое описание</label>
                            <input class="form-control" name="description" type="text" value="{{ $option->description }}"
                                   id="text-input-name">
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')

@stop
