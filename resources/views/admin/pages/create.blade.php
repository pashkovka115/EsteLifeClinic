@extends('admin.layouts.app')

@section('title', 'Страницы')
@section('pageName', 'Создать страницу')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Создать страницу</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.pages.pages.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text-input-name">H1</label>
                            <input class="form-control" type="text" name="h1" value="{{ old('h1') }}"
                                   id="text-input-name">
                        </div>
                        <div class="form-group">
                            <label for="text-input-title">Title*</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}"
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
                    <label for="elm1">Статья</label>
                    <textarea name="content" class="form-control" rows="5"
                              id="elm1">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="elm1">Meta description</label>
                    <textarea name="meta_description" class="form-control"
                              rows="5">{{ old('meta_description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="elm1">Meta keywords</label>
                    <textarea name="keywords" class="form-control"
                              rows="5">{{ old('keywords') }}</textarea>
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
