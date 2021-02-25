@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Редактировать услугу: '. $service->name )
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.services.services.index') }}">Услуги</a></li>
    <li class="breadcrumb-item active">Редактировать услугу</li>
@endsection

@section('headerStyle')
    <link href="{{ URL::asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
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

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-before_after-tab" data-toggle="pill" href="#pills-before_after" role="tab"
                       aria-controls="pills-before_after" aria-selected="false">До/После</a>
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
                                        <div class="form-group">
                                            <label for="text-input-name">Имя</label>
                                            <input class="form-control" type="text" name="name"
                                                   value="{{ $service->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="text-input-name">Цена (имеет приоритет над ценой по акции)</label>
                                            <input class="form-control" type="text" name="price"
                                                   value="{{ $service->price }}">
                                        </div>

                                        <div class="form-group">
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

                                        <div class="form-group">
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
                                        <input type="file" name="img" class="dropify"
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
                                        <input type="file" name="ico1" class="dropify"
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
                                        <input type="file" name="ico2" class="dropify"
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
                                        <input type="file" name="ico3" class="dropify"
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
                                        <input type="file" name="ico4" class="dropify"
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
                                <select id="priceservice_id" name="priceservice_id" class="form-control" required>
                                    <option value="">Выберите цену</option>
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
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Направление</th>
                                        <th>Тип</th>
                                        <th>Наименование</th>
                                        <th>Стоимость, руб.</th>
                                        <th>Стоимость со скидкой, руб.</th>
                                        <th>#</th>
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
                                            <td>
                                                @if($price->type == 1)
                                                    Группа
                                                @elseif($price->type == 2)
                                                    Цена
                                                @endif
                                            </td>
                                            <td>{{ $price->name }}</td>
                                            <td>{{ $price->price }}</td>
                                            <td>{{ $price->discount_price }}</td>
                                            <td>
                                                <a href="{{ route('admin.services.service.service_detach_price', ['service_id' => $service->id, 'priceservice_id' => $price->id]) }}"
                                                   onclick="if (confirm('Удалить связь цены с этой услугой?')) document.getElementById('form_{{ $price->id }}').submit(); return false;">
                                                    <i class="fas fa-trash-alt text-danger"></i></a>
                                                <form id="form_{{ $price->id }}" action="{{ route('admin.services.service.service_detach_price', ['service_id' => $service->id, 'priceservice_id' => $price->id]) }}" method="POST" style="display: none;">
                                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                    <input type="hidden" name="priceservice_id" value="{{ $price->id }}">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade show" id="pills-before_after" role="tabpanel"
                     aria-labelledby="pills-before_after-tab">
                    <form action="{{ route('admin.content.before_after.before_after.store') }}" method="post"
                    enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cat_service_id" value="{{ $service->category->id }}">
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="done" value="{{ now() }}">
                        <input type="hidden" name="redirect_back" value="true">
                        <div class="row">

                            <div class="form-group col-sm-6">
                                <label>Врач</label>
                                <select name="doctor_id" class="form-control" required>
                                    <option value="">Выберите врача</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Описание</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Фото до</h4>
                                        <input type="file" name="before_images" class="dropify">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Фото после</h4>
                                        <input type="file" name="after_images" class="dropify">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-success col-sm-1 mt-4" style="height: 40px">
                            Добавить
                        </button>
                    </form>
                    <hr>

                    <div class="row mt-5">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="datatable2" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Категория</th>
                                        <th>Врач</th>
                                        <th>Описание</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($service->treatment_history as $bef_aft)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bef_aft->category->name }}</td>
                                            <td>{{ $bef_aft->doctor->name }}</td>
                                            <td>{{ $bef_aft->description }}</td>
                                            <td style="min-width: 50px">
                                                <a target="_blank" href="{{ route('admin.content.before_after.before_after.edit', ['before_after' => $bef_aft->id]) }}"><i
                                                        class="far fa-edit text-warning mr-1"></i></a>
                                                <a href="{{ route('admin.content.before_after.before_after.destroy', ['before_after' => $bef_aft->id]) }}"
                                                   onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $bef_aft->id }}').submit(); return false;">
                                                    <i class="fas fa-trash-alt text-danger"></i></a>
                                                <form id="form_{{ $bef_aft->id }}" action="{{ route('admin.content.before_after.before_after.destroy', ['before_after' => $bef_aft->id]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
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
    {{--  datatables  --}}
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
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
    <script>
        $(document).ready(function () {

            $('#datatable').DataTable({
                "pagingType": "full_numbers",

                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                }
            });

            $('#datatable2').DataTable({
                "pagingType": "full_numbers",

                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                }
            });
        });

    </script>
@stop
