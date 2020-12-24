@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Создать услугу')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Создать услугу</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.services.services.store') }}" method="post">
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
                                        <label for="text-input-name">Имя</label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                               id="text-input-name">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Цена</label>
                                    <input class="form-control" name="price" type="text" value="{{ old('price') }}">
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Тип услуги</label>
                                    <select name="type" class="form-control">
                                        <option value="medicine">Медицина</option>
                                        <option value="cosmetology">Косметология</option>
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

                <div class="form-group col-sm-12">
                    <?php
                    function categories($category, $parent_name = ''){
                        if ($parent_name != ''){
                            $name = $parent_name . ' → ' . $category->name;
                        }else{
                            $name = $parent_name . $category->name;
                        }

                        echo "<option value=\"$category->id\">$name</option>";

                        if ($parent_name == ''){
                            $parent_name .= $category->name;
                        }else{
                            $parent_name .= ' → ' . $category->name;
                        }

                        foreach ($category->children as $child){
                            categories($child, $parent_name);
                        }
                    }
                    ?>
                    <label>Категория</label>
                    <select name="parent_id" class="form-control">
                        @foreach($categories as $category)
                            <?php categories($category); ?>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="elm1">Описание</label>
                    <textarea name="description" class="form-control" rows="5"
                              id="elm1">{{ old('description') }}</textarea>
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
                {{--<div class="form-group">
                    <label for="elm2">META Keywords</label>
                    <textarea name="keywords"
                              class="form-control" rows="5">{{ old('keywords') }}</textarea>
                </div>--}}

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
