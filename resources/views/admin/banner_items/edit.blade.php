@extends('admin.layouts.app')

@section('title', 'Элемент баннера')

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <form enctype="multipart/form-data"
                         action="{{ route('admin.options.banners.banner.item.update', ['id' => $item->id]) }}" method="post">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.options.banners.banner.item.create', ['id' => $item->banner_id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Добавить</a>
            <a href="{{ route('admin.options.banners.banner.items', ['id' => $item->banner_id]) }}" class="btn btn-primary"> Вернуться к списку</a>
            <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
        </div>
        <div class="card-body">

                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text-input-name">Заголовок</label>
                                        <input class="form-control" type="text" name="title" value="{{ $item->title }}"
                                               id="text-input-name">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="text-input-name">Заголовок</label>
                                    <input class="form-control" type="text" name="title" value="{{ $item->banner->name }}" disabled>
                                    <input type="hidden" name="banner_id" value="{{ $item->banner->id }}">
                                </div>

                                <div class="checkbox my-2">
                                    <div class="custom-control custom-checkbox">
                                        <?php
                                        if ($item->visibility == '1'){
                                            $checked = ' checked';
                                        }else{ $checked = ''; }
                                        ?>
                                        <input type="checkbox" name="visibility" class="custom-control-input"{{ $checked }} id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck3">Показывать</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="img" id="input-file-now-custom-1" class="dropify"
                                       @if($item->img) data-default-file="{{ URL::asset('storage/' . $item->img)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="elm1">Описание</label>
                    <textarea name="description" class="form-control" rows="5"
                              id="elm1">{{ $item->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
        </div>
    </div>
    </form>


@stop

@section('footerScript')
    {{--    upload files --}}
    <script src="{{ URL::asset('assets/pages/jquery.form-upload.init.js') }}"></script>
    <script src="{{ URL::asset('plugins/dropify/js/dropify.min.js')}}"></script>
    {{-- text editor --}}
    <script src="{{ URL::asset('plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/jquery.form-editor.init.js')}}"></script>
@stop
