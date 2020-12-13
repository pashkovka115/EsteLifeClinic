@extends('admin.layouts.app')

@section('title', 'Категория услуг')

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.services.categories.update', ['category' => $cat->id]) }}"
                  method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text-input-name">Наименование</label>
                            <input class="form-control" type="text" name="name" value="{{ $cat->name }}"
                                   id="text-input-name">
                        </div>

                        <div class="form-group">
                            <?php
                            function categories($category, $current_cat_id, $current_cat_parent_id, $parent_name = ''){
                                if ($category->id == $current_cat_id){
                                    return;
                                }
                                if ($parent_name != ''){
                                    $name = $parent_name . ' → ' . $category->name;
                                }else{
                                    $name = $parent_name . $category->name;
                                }
                                if ($category->id == $current_cat_parent_id){
                                    $selected = ' selected';
                                }else{
                                    $selected = '';
                                }

                                echo "<option value=\"$category->id\"$selected>$name</option>";

                                if ($parent_name == ''){
                                    $parent_name .= $category->name;
                                }else{
                                    $parent_name .= ' → ' . $category->name;
                                }

                                foreach ($category->children as $child){
                                    categories($child, $current_cat_id, $current_cat_parent_id, $parent_name);
                                }
                            }
                            ?>
                            <label>Родительская категория</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">Без родительской категории</option>
                                @foreach($categories as $category)
                                    <?php categories($category, $cat->id, $cat->parent_id); ?>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="file" name="img" id="input-file-now-custom-1" class="dropify" @if($cat->img) data-default-file="{{ URL::asset('storage/' . $cat->img)}}" @endif />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">Описание</label>
                            <textarea class="form-control" name="description">{{ $cat->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">Title</label>
                            <input class="form-control" type="text" name="title" value="{{ $cat->title }}"
                                   id="text-input-name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">META Description</label>
                            <textarea class="form-control" name="meta_description">{{ $cat->meta_description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">META Keywords</label>
                            <textarea class="form-control" name="keywords">{{ $cat->keywords }}</textarea>
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
@stop
