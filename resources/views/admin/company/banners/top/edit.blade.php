@extends('admin.layouts.app')

@section('title', 'Элемент баннера')
@section('pageName', 'Элемент баннера')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Элемент баннера</li>
@endsection
@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')

    <form enctype="multipart/form-data" action="{{ route('admin.pages.company.banners.update', ['id' => $item->id]) }}" method="post">
        @csrf
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    @if($item->img != 'x')
                        <input type="file" name="img" id="input-file-now-custom-1" class="dropify"
                               @if($item->img) data-default-file="{{ URL::asset('storage/' . $item->img)}}" @endif />
                    @endif
                    @if($item->title != 'x')
                        <div class="form-group" style="margin-top: 20px">
                            <label>Заголовок</label>
                            <input name="title" class="form-control" value="{{ $item->title }}">
                        </div>
                    @endif
                    @if($item->description != 'x')
                        <div class="form-group" style="margin-top: 20px">
                            <label>Описание</label>
                            <textarea id="elm1" name="description" rows="6" class="form-control">{!! $item->description !!}</textarea>
                        </div>
                    @endif

{{--                    <input type="hidden" name="id" value="{{ $item->id}}">--}}
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
