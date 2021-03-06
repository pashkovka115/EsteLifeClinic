@extends('admin.layouts.app')

@section('title', 'Категория услуг')
@section('pageName', 'Редактируем категорию услуг')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.services.categories.index') }}">Категории</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.services.services.index') }}">Услуги</a></li>
    <li class="breadcrumb-item active">Редактируем категорию услуг</li>
@endsection

@section('headerStyle')

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
                    <div class="form-group col-sm-6">
                        <label for="text-input-name">Наименование</label>
                        <input class="form-control" type="text" name="name" value="{{ $cat->name }}">
                    </div>
{{--                    <p class="col-sm-3"><img src="/storage/{{ $cat->img }}" alt=""></p>--}}
                    <div class="form-group col-sm-3">
                        <label for="text-input-name">Иконка</label>
                        <input class="form-control" type="file" name="img">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="text-input-name">Фоновая картинка</label>
                        <input class="form-control" type="file" name="bg_img">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Тип</label>
                        <select name="type" class="form-control">
                            @foreach($all_types as $key => $name)
                                <?php
                                $selected = '';
                                if ($current_type == $key){
                                    $selected = ' selected';
                                }
                                ?>
                                <option value="{{ $key }}"{{ $selected }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="form-group col-sm-6">
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
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="before_after" class="custom-control-input" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                            <label class="custom-control-label" for="customCheck3">Показывать в меню "До/После"</label>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>

@stop

@section('footerScript')
    <script>
        var select = $('select[name="parent_id"]');

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
