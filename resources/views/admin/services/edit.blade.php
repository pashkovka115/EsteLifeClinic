@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Редактировать услугу: '. $service->name )
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.services.services.index') }}">Услуги</a></li>
    <li class="breadcrumb-item active">Редактировать услугу</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
    <style>
        .custom-width .dropify-wrapper {
            height: 90px;
        }
    </style>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general"
                       role="tab"
                       aria-controls="pills-general" aria-selected="true">Общая информация</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-price-tab" data-toggle="pill" href="#pills-price" role="tab"
                       aria-controls="pills-price" aria-selected="false">Цены</a>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-general" role="tabpanel"
                     aria-labelledby="pills-general-tab">

                    <form enctype="multipart/form-data"
                          action="{{ route('admin.services.services.update', ['service' => $service->id]) }}"
                          method="post">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="text-input-name">Имя</label>
                                                <input class="form-control" type="text" name="name"
                                                       value="{{ $service->name }}"
                                                       id="text-input-name">
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label>Тип услуги</label>
                                            <select name="type" class="form-control">
                                                @foreach($all_types as $key => $name)
                                                    <?php
                                                    $selected = '';
                                                    if ($current_type == $key) {
                                                        $selected = ' selected';
                                                    }
                                                    ?>
                                                    <option value="{{ $key }}"{{ $selected }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <?php
                                            function categories($category, $service_cat_id, $parent_name = '')
                                            {
                                                if ($parent_name != '') {
                                                    $name = $parent_name . ' → ' . $category->name;
                                                } else {
                                                    $name = $parent_name . $category->name;
                                                }

                                                if ($category->id == $service_cat_id) {
                                                    $selected = ' selected';
                                                } else {
                                                    $selected = '';
                                                }

                                                echo "<option value=\"$category->id\"$selected>$name</option>";

                                                if ($parent_name == '') {
                                                    $parent_name .= $category->name;
                                                } else {
                                                    $parent_name .= ' → ' . $category->name;
                                                }

                                                foreach ($category->children as $child) {
                                                    categories($child, $service_cat_id, $parent_name);
                                                }
                                            }
                                            ?>
                                            <label>Категория</label>
                                            <select name="cat_service_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <?php categories($category, $service->category->id); ?>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <input type="file" name="img" id="input-file-now-custom-1" class="dropify"
                                               @if($service->img) data-default-file="{{ URL::asset('storage/' . $service->img)}}" @endif />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="elm1">Краткое описание</label>
                            <textarea name="short_description" class="form-control" rows="5"
                                      id="elm1">{{ $service->short_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="elm1">Полное описание</label>
                            <textarea name="description" class="form-control" rows="5"
                                      id="elm2">{{ $service->description }}</textarea>
                        </div>


                        <div class="row">
                            <h3 class="col-sm-12">Преимущества этой услуги</h3>
                            <div class="form-group col-sm-8">
                                <textarea name="service1" class="form-control"
                                          rows="5">{{ $service->service1 }}</textarea>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body custom-width">
                                        <input type="file" name="ico1" id="input-file-now-custom-1" class="dropify"
                                               @if($service->ico1) data-default-file="{{ URL::asset('storage/' . $service->ico1)}}" @endif />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-8">
                                <textarea name="service2" class="form-control"
                                          rows="5">{{ $service->service2 }}</textarea>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body custom-width">
                                        <input type="file" name="ico2" id="input-file-now-custom-1" class="dropify"
                                               @if($service->ico2) data-default-file="{{ URL::asset('storage/' . $service->ico2)}}" @endif />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-8">
                                <textarea name="service3" class="form-control"
                                          rows="5">{{ $service->service3 }}</textarea>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body custom-width">
                                        <input type="file" name="ico3" id="input-file-now-custom-1" class="dropify"
                                               @if($service->ico3) data-default-file="{{ URL::asset('storage/' . $service->ico3)}}" @endif />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-8">
                                <textarea name="service4" class="form-control"
                                          rows="5">{{ $service->service4 }}</textarea>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body custom-width">
                                        <input type="file" name="ico4" id="input-file-now-custom-1" class="dropify"
                                               @if($service->ico4) data-default-file="{{ URL::asset('storage/' . $service->ico4)}}" @endif />
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" type="text" value="{{ $service->title }}">
                        </div>
                        <div class="form-group">
                            <label for="elm2">META Description</label>
                            <textarea name="meta_description"
                                      class="form-control" rows="5">{{ $service->meta_description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
                    </form>

                </div>

                <div class="tab-pane fade show" id="pills-price" role="tabpanel"
                     aria-labelledby="pills-price-tab">
                    <form action="{{ route('admin.services.services.service_price_store') }}" method="post">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <div class="row">

                            <div class="form-group col-sm-3">
                                <label>Направления</label>
                                <select id="pricedirection_id" class="form-control" name="pricedirection_id">
                                    @foreach($directions as $direction)
                                        <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Список цен</label>
                                <select id="priceservice_id" name="priceservice_id" class="form-control">
                                    <option>Выберите цену</option>
                                    @foreach($services as $serv)
                                        <option value="{{ $serv->id }}">{{ $serv->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-gradient-success col-sm-1 mt-4" style="height: 40px">
                                Добавить
                            </button>
                        </div>
                    </form>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Направление</th>
                                        <th>Наименование</th>
                                        <th>Стоимость, руб.</th>
                                        <th>Стоимость со скидкой, руб.</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tie_services as $price)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                      {{--   Направление смотрим у объекта или его родителя (потому что)    --}}
                                                @if($price->directions->count() > 0)
                                                    @foreach($price->directions as $dir)
                                                        <span>{{ $dir->name }}</span>
                                                    @endforeach
                                                @elseif(!is_null($price->parent))
                                                    @foreach($price->parent->directions as $dir)
                                                        <span>{{ $dir->name }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ $price->name }}</td>
                                            <td>{{ $price->price }}</td>
                                            <td>{{ $price->discount_price }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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

        function categories(category, parent_name) {
            var name;
            if (parent_name !== '') {
                name = parent_name + ' → ' + category.name;
            } else {
                name = parent_name + category.name;
            }

            select.append('<option value="' + category.id + '">' + name + '</option>');

            if (parent_name === '') {
                parent_name += category.name;
            } else {
                parent_name += ' → ' + category.name;
            }

            if (category.children.length > 0) {
                for (var i = 0; i < category.children.length; i++) {
                    categories(category.children[i], parent_name);
                }
            }
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('select[name="type"]').on('change', function () {
            $.ajax({
                url: '{{ route('admin.services.categories.get_categories') }}',
                method: 'POST',
                data: {
                    type: $(this).val()
                },
                success: function (resp) {
                    var cats = JSON.parse(resp);

                    select.empty();
                    select.append('<option value="0">Без родительской категории</option>');

                    for (var i = 0; i < cats.length; i++) {
                        categories(cats[i], '')
                    }
                }
            });
        });

        $('select#pricedirection_id').on('change', function () {
            var select_service = $('select#priceservice_id');
            select_service.empty();

            $.ajax({
                url: '{{ route('admin.price.category.get_price_ajax') }}', // todo
                method: 'POST',
                data: {
                    pricedirection_id: $('select#pricedirection_id').val()
                },
                success: function (resp) {
                    var cats = JSON.parse(resp);
                    // console.log(cats)

                    select_service.append('<option value="0">Выберите цену</option>');

                    for (var i = 0; i < cats.length; i++) {
                        select_service.append('<option value="' + cats[i].id + '">' + cats[i].name + '</option>');
                    }


                }
            });
        });
    </script>
@stop
