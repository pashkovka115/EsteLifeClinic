@extends('admin.layouts.app')

@section('title', 'Элемент баннера')
@section('pageName', 'Создать элемент баннера')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Создать элемент баннера</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.options.banners.banner.item.store', ['id' => $banner->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text-input-name">Заголовок</label>
                                        <input class="form-control" type="text" name="title" value="{{ old('title') }}"
                                               id="text-input-name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="text-input-name">Баннер</label>
                                    <input class="form-control" type="text" name="title" value="{{ $banner->name }}" disabled>
                                    <input type="hidden" name="banner_id" value="{{ $banner->id }}">
                                </div>

                                <div class="checkbox my-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="visibility" class="custom-control-input" checked id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck3">Показывать</label>
                                    </div>
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
                    <label for="elm1">Описание</label>
                    <textarea name="description" class="form-control" rows="5"
                              id="elm1">{{ old('description') }}</textarea>
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
