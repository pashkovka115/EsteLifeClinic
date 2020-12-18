@extends('admin.layouts.app')

@section('title', 'Наши врачи')

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.actions.actions.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text-input-name">Наименование</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                   id="text-input-name">
                        </div>
                        <div class="form-group">
                            <label for="text-input-title">Тип</label>
                            <input class="form-control" type="text" name="type" value="{{ old('type') }}"
                                   id="text-input-title">
                        </div>
                        <div class="form-group">
                            <label for="text-input-title">Слоган акции</label>
                            <input class="form-control" type="text" name="slogan" value="{{ old('slogan') }}"
                                   id="text-input-title">
                        </div>
                        <div class="form-group">
                            <label for="text-input-title">Размер скидки</label>
                            <input class="form-control" type="text" name="discount" value="{{ old('discount') }}"
                                   id="text-input-title">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="file" name="img" id="input-file-now-custom-1" class="dropify">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="elm1">Описание</label>
                    <textarea name="description" class="form-control" rows="5"
                              id="elm1">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Начало акции</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="date" name="start" value="{{ old('start') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Окончание акции</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="date" name="finish" value="{{ old('finish') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')
    {{--    upload files --}}
    <script src="{{ URL::asset('assets/pages/jquery.form-upload.init.js') }}"></script>
    <script src="{{ URL::asset('plugins/dropify/js/dropify.min.js')}}"></script>
    {{-- text editor --}}
    <script src="{{ URL::asset('plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/jquery.form-editor.init.js')}}"></script>
@stop
