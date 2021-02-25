@extends('admin.layouts.app')

@section('title', 'Редактируем акцию')
@section('pageName', 'Редактируем акцию: ' . $action->name)
@section('breadcrumbs')
    <li class="breadcrumb-item active">Редактируем акцию</li>
@endsection
@section('headerStyle')
    <link href="{{ URL::asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab"
                       aria-controls="pills-general" aria-selected="true">Общая информация</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-services-tab" data-toggle="pill" href="#pills-services" role="tab"
                       aria-controls="pills-services" aria-selected="false">Услуги</a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.content.actions.actions.update', ['action' => $action->id]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text-input-name">Наименование</label>
                            <input class="form-control" type="text" name="name" value="{{ $action->name }}"
                                   id="text-input-name">
                        </div>
                        <div class="form-group">
                            <label>Тип (программа обследования, ежемесячная акция, ежегодная скидка, ...)</label>
                            <input class="form-control" type="text" name="type" value="{{ $action->type }}">
                        </div>
                        <div class="form-group">
                            <label>Слоган акции</label>
                            <input class="form-control" type="text" name="slogan" value="{{ $action->slogan }}">
                        </div>
                        <div class="form-group">
                            <label>Размер скидки</label>
                            <input class="form-control" type="number" name="discount" value="{{ $action->discount }}">
                        </div>

                        <div class="form-group">
                            <label>Условия акции</label>
                            <textarea name="conditions" class="form-control"
                                      id="elm1" rows="3">{{ $action->conditions }}</textarea>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <p>Большая</p>
                            <input type="file" name="big_img" id="input-file-now-custom-1" class="dropify"
                                   @if($action->big_img) data-default-file="{{ URL::asset('storage/' . $action->big_img)}}" @endif />
                        </div>
                        <div class="form-group">
                            <p>Для баннера</p>
                            <input type="file" name="banner_img" id="input-file-now-custom-2" class="dropify"
                                   @if($action->banner_img) data-default-file="{{ URL::asset('storage/' . $action->banner_img)}}" @endif />
                        </div>
                    </div>

                </div>

                <div class="form-group mb-5">
                    <label>Краткое описание (для ленты)</label>
                    <textarea name="short_description" class="form-control"
                              rows="1">{{ $action->short_description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="elm1">Описание</label>
                    <textarea name="description" class="form-control" rows="5"
                              id="elm2">{{ $action->description }}</textarea>
                </div>

                <div class="form-group">
                    <label>Начало акции</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="date" name="start" value="{{ $action->start }}">
                    </div>
                </div>

                <div class="form-group">
                    <label>Окончание акции</label>
                    <div class="col-sm-12">
                        <input class="form-control" type="date" name="finish" value="{{ $action->finish }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
                </div>

                <div class="tab-pane fade show" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">

                    <form action="{{ route('admin.content.actions.add_tie_service_actions') }}" method="post">
                        @csrf
                        <input type="hidden" name="action_id" value="{{ $action->id }}">
                        <div class="row">

                            <div class="form-group col-sm-3">
                                <label>Направления</label>
                                <select id="type_directions" class="form-control" name="type_directions">
                                    <option value="medicine" selected>Медицина</option>
                                    <option value="cosmetology">Косметология</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Список услуг</label>
                                <select id="service_id" name="service_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        @foreach($category->services as $serv)
                                            <option value="{{ $serv->id }}">{{ $serv->name }}</option>
                                        @endforeach
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
                                        <th>Наименование</th>
                                        <th>Цены</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($action->services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $service->name }}
                                            </td>

                                            <td>
                                                <table>
                                                    <tr>
                                                        <th>Наименование</th>
                                                        <th>Цена</th>
                                                        <th>Цена со скидкой</th>
                                                    </tr>
                                                @foreach($service->prices as $p)
                                                    <tr>
                                                    <td>{{ $p->name }}</td>
                                                    <td><div class="minw100" ondblclick="onCode(this, {{ $p->id }}, 'price')">{{ $p->price }}</div></td>
                                                    <td><div class="minw100" ondblclick="onCode(this, {{ $p->id }}, 'discount_price')">{{ $p->discount_price }}</div></td>
                                                    </tr>
                                                @endforeach
                                                </table>
                                            </td>

                                             <td>
                                                <a href="{{ route('admin.content.actions.destroy_tie_service_actions') }}" title="Отсоединить эту услугу от акции"
                                                    onclick="if (confirm('Удалить связь с этой услугой?')) document.getElementById('form_{{ $service->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                                                 <form id="form_{{ $service->id }}" action="{{ route('admin.content.actions.destroy_tie_service_actions') }}" method="POST" style="display: none;">
                                                     <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                     <input type="hidden" name="action_id" value="{{ $action->id }}">
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
    {{--  datatables  --}}
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>

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
        });

        function onCode(el, id, field){
            el.innerHTML = '<input type="text" class="input-custom" value="'+ el.innerHTML +'">';
            $el = $(el).find('input').focus();
            $el.on('blur', function (){
                el.innerHTML = $el.val();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.price.service.update') }}',
                    data: {
                        id: id,
                        field: field,
                        data: el.innerHTML.trim()
                    }
                });
            })
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('select#type_directions').on('change', function () {
            $.ajax({
                url: '{{ route('admin.content.actions.service_actions.get') }}',
                method: 'POST',
                data: {
                    type: $(this).val()
                },
                success: function (resp) {
                    var cats = JSON.parse(resp);
                    var select = $('select#service_id');

                    select.empty();

                    for (var i = 0; i < cats.length; i++) {
                        for (var j = 0; j < cats[i].services.length; j++) {
                            select.append('<option value="' + cats[i].services[j].id + '">' + cats[i].services[j].name + '</option>');
                        }
                    }
                }
            });
        });

    </script>
@stop
