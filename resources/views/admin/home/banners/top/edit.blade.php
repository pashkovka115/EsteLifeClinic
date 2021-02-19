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

    <form enctype="multipart/form-data" action="{{ route('admin.pages.home.banner_home_item_update') }}" method="post">
        @csrf
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <input type="file" name="img" id="input-file-now-custom-1" class="dropify"
                           @if($item->img) data-default-file="{{ URL::asset('storage/' . $item->img)}}" @endif />
                    <div class="form-group" style="margin-top: 20px">
                        <label for="elm1">Заголовок (если есть)</label>
                        <input name="title" class="form-control" value="{{ $item->title }}">
                    </div>

                    <input type="hidden" name="id" value="{{ $item->id}}">
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
@stop
