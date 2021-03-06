@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Новая услуга')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.services.services.index') }}">Услуги</a></li>
    <li class="breadcrumb-item active">Новая услуга</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
    <style>
        .custom-width .dropify-wrapper{
            height: 90px;
        }
    </style>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.services.services.store') }}" method="post">
                @csrf

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
                                    <label>Тип услуги</label>
                                    <select name="type" class="form-control">
                                        <option value="medicine" selected>Медицина</option>
                                        <option value="cosmetology">Косметология</option>
                                    </select>
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
                                    <select name="cat_service_id" class="form-control">
                                        @foreach($categories as $category)
                                            <?php categories($category); ?>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="img" id="input-file-now-custom-1" class="dropify">
                            </div>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label for="elm1">Краткое описание</label>
                    <textarea name="short_description" class="form-control" rows="5"
                              id="elm1">{{ old('short_description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="elm1">Полное описание</label>
                    <textarea name="description" class="form-control" rows="5"
                              id="elm2">{{ old('description') }}</textarea>
                </div>


                <div class="row">
                    <h3 class="col-sm-12">Преимущества этой услуги</h3>
                    <div class="form-group col-sm-8">
                        <textarea name="service1" class="form-control" rows="5">{{ old('service1') }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body custom-width">
                                <input type="file" name="ico1" id="input-file-now-custom-1" class="dropify">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service2" class="form-control" rows="5">{{ old('service2') }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body custom-width">
                                <input type="file" name="ico2" id="input-file-now-custom-1" class="dropify">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service3" class="form-control" rows="5">{{ old('service3') }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body custom-width">
                                <input type="file" name="ico3" id="input-file-now-custom-1" class="dropify">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service4" class="form-control" rows="5">{{ old('service4') }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body custom-width">
                                <input type="file" name="ico4" id="input-file-now-custom-1" class="dropify">
                            </div>
                        </div>
                    </div>
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

    <script>
        var select = $('select[name="cat_service_id"]');

        function categories(category, parent_name){
            var name;
            if (parent_name !== '') {
                name = parent_name + ' → ' + category.name;
            } else {
                name = parent_name + category.name;
            }

            select.append('<option value="'+ category.id +'">'+ name +'</option>');

            if (parent_name === ''){
                parent_name += category.name;
            }else{
                parent_name += ' → ' + category.name;
            }

            if (category.children.length > 0){
                for (var i = 0; i < category.children.length; i++){
                    categories(category.children[i], parent_name);
                }
            }
        }

        $('select[name="type"]').on('change', function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: '{{ route('admin.services.categories.get_categories') }}',
                method: 'POST',
                data: {
                    type: $(this).val()
                },
                success: function (resp){
                    var cats = JSON.parse(resp);

                    select.empty();
                    select.append('<option value="0">Без родительской категории</option>');

                    for (var i =0; i < cats.length; i++){
                        categories(cats[i], '')
                    }
                }
            });
        });
    </script>
@stop
