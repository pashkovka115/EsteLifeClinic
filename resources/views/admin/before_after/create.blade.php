@extends('admin.layouts.app')

@section('title', 'До/После')
@section('pageName', 'Создать до/после')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Создать до/после</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.content.before_after.before_after.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
                    </div>
                </div>

                    <div class="form-group">
                        <label for="text-input-name">Оказанная услуга</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                               id="text-input-name">
                    </div>

                    <div class="form-group">
                        <label for="example-date-input">Дата</label>
                        <input class="form-control" type="date" name="done" value="{{ old('done') }}" id="example-date-input">
                    </div>

                <div class="form-group">
                    <label>Врач</label>
                    <select name="doctor_id" class="form-control">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Категория услуги</label>
                    <select name="cat_service_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Фото до</h4>
                                <input type="file" name="before_images" id="input-file-now-custom-2" class="dropify" />
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Фото после</h4>
                                <input type="file" name="after_images" id="input-file-now-custom-2" class="dropify" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="elm2">Описание</label>
                            <textarea name="description" class="form-control" rows="3"
                                      id="elm2">{{ old('description') }}</textarea>
                        </div>
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
