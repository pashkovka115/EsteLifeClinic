@extends('admin.layouts.app')

@section('title', 'Категория услуг')
@section('pageName', 'Создать категорию услуг')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Создать категорию услуг</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.services.categories.store') }}"
                  method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text-input-name">Наименование</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                   id="text-input-name">
                        </div>
                        <div class="form-group">
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
                            <label>Родительская категория</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">Без родительской категории</option>
                                @foreach($categories as $category)
                                    <?php categories($category); ?>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="before_after" class="custom-control-input" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                            <label class="custom-control-label" for="customCheck3">Показывать в меню "До/После"</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="file" name="img" id="input-file-now-custom-1" class="dropify" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">Описание</label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">Title</label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}"
                                   id="text-input-name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">META Description</label>
                            <textarea class="form-control" name="meta_description">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>

                {{--<div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">META Keywords</label>
                            <textarea class="form-control" name="keywords">{{ old('keywords') }}</textarea>
                        </div>
                    </div>
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
@stop
