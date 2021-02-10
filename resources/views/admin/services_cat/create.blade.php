@extends('admin.layouts.app')

@section('title', 'Категория услуг')
@section('pageName', 'Создать категорию услуг')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.services.categories.index') }}">Категории</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.services.services.index') }}">Услуги</a></li>
    <li class="breadcrumb-item active">Создать категорию услуг</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.services.categories.store') }}"
                  method="post">
                @csrf
                <div class="form-group">
                    <label for="text-input-name">Наименование</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                           id="text-input-name">
                </div>
                <div class="row">


                    <div class="form-group col-sm-6">
                        <label>Тип услуги</label>
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
