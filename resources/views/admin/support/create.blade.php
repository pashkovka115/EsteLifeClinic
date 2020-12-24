@extends('admin.layouts.app')

@section('title', 'Поддержка')
@section('pageName', 'Написать в поддержку')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Написать в поддержку</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')

    <form enctype="multipart/form-data" action="{{ route('admin.support.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-8">
                        <label>Тема</label>
                        <input name="theme" class="form-control" type="text">
                    </div>

                    <div class="form-group col-sm-4">
                        <input type="file" name="img" id="input-file-now-custom-1" class="dropify">
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea name="description" class="form-control" rows="5" id="elm1"></textarea>
                </div>
                <button type="submit" class="btn btn-gradient-success my-3">Отправить</button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Ранее отправленные сообщения</h5>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Тема</th>
                    <th>Сообщение</th>
                    <th>Фото</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                    <tr>
                        <td>{{ $message->theme }}</td>
                        <td>{{ $message->description }}</td>
                        <td>
                            @if($message->img)
                                <img src="/storage/{{ $message->img }}" alt="" style="max-width: 200px; height: auto; max-height: 100px; width: auto">
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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
