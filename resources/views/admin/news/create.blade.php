@extends('admin.layouts.app')

@section('title', 'Новости')
@section('pageName', 'Создать новость')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Создать новость</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.pages.news.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text-input-name">Заголовок</label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                               id="text-input-name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text-input-name">Время чтения</label>
                                        <input class="form-control" type="text" name="read_time" value="{{ old('read_time') }}"
                                               id="text-input-name">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Категория</label>
                                    <select name="cat_post_id" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="img" id="input-file-now-custom-1" class="dropify" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="elm1">Контент</label>
                    <textarea name="content" class="form-control" rows="5" id="elm1">{{ old('content') }}</textarea>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" name="title" type="text" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="elm2">META Description</label>
                    <textarea name="meta_description"
                              class="form-control" rows="5">{{ old('meta_description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="elm2">META Keywords</label>
                    <textarea name="keywords"
                              class="form-control" rows="5">{{ old('keywords') }}</textarea>
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
