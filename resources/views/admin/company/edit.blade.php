@extends('admin.layouts.app')

@section('title', 'О компании')
@section('pageName', 'О компании')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="">Товары</a></li>
    <li class="breadcrumb-item active">Категории</li>
@endsection
@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
    <style>
        div.dropify-wrapper{
            height: 90px;
        }
    </style>
@stop

@section('content')
    <form enctype="multipart/form-data" action="{{ route('admin.pages.company.update', ['company' => 'company']) }}" method="post">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header">
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="text-input-name">Заголовок</label>
                        <input class="form-control" type="text" name="h1" value="{{ $company->h1 }}"
                               id="text-input-name">
                    </div>

                    <div class="form-group col-sm-12">
                        <label>Верхний слайдер</label>
                        <select name="top_slider" class="form-control">
                            <option value="0">Баннер отключен</option>
                            @foreach($banners as $banner)
                                <?php
                                $selected = '';
                                if ($company->top_sliders){
                                    if ($banner->id == $company->top_sliders->id){
                                        $selected = ' selected';
                                    }
                                }
                                ?>
                                <option value="{{ $banner->id }}" {{ $selected }}>{{ $banner->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="text-input-name">Кто мы такие?</label>
                        <input class="form-control" type="text" name="h3" value="{{ $company->h3 }}"
                               id="text-input-name">
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="text-input-name">Наш опыт</label>
                        <input class="form-control" type="text" name="practice" value="{{ $company->practice }}"
                               id="text-input-name">
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="text-input-name">Проведено процедур</label>
                        <input class="form-control" type="text" name="practice" value="{{ $company->cnt }}"
                               id="text-input-name">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="elm1">Описание</label>
                        <textarea name="description" class="form-control" rows="5"
                                  id="elm1">{{ $company->description }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <h3 class="col-sm-12">Наши преимущества</h3>
                    <div class="form-group col-sm-8">
                        <textarea name="service1" class="form-control" rows="5">{{ $company->service1 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico1" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico1) data-default-file="{{ URL::asset('storage/' . $company->ico1)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service2" class="form-control" rows="5">{{ $company->service2 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico2" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico2) data-default-file="{{ URL::asset('storage/' . $company->ico2)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service3" class="form-control" rows="5">{{ $company->service3 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico3" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico3) data-default-file="{{ URL::asset('storage/' . $company->ico3)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service4" class="form-control" rows="5">{{ $company->service4 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico4" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico4) data-default-file="{{ URL::asset('storage/' . $company->ico4)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label>Средний слайдер</label>
                        <?php //dd($company->middle_sliders);  ?>
                        <select name="middle_slider" class="form-control">
                            <option value="0">Баннер отключен</option>
                            @foreach($banners as $banner)
                            <?php
                            $selected = '';
                            if ($company->middle_sliders){
                                if ($banner->id == $company->middle_sliders->id){
                                    $selected = ' selected';
                                }
                            }
                            ?>
                                <option value="{{ $banner->id }}" {{ $selected }}>{{ $banner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label>Нижний слайдер</label>
                        <select name="bottom_slider" class="form-control">
                            <option value="0">Баннер отключен</option>
                            @foreach($banners as $banner)
                                <?php
                                $selected = '';
                                if ($company->bottom_sliders){
                                    if ($banner->id == $company->bottom_sliders->id){
                                        $selected = ' selected';
                                    }
                                }
                                ?>
                                <option value="{{ $banner->id }}" {{ $selected }}>{{ $banner->name }}</option>
                            @endforeach
                        </select>
                    </div>
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
