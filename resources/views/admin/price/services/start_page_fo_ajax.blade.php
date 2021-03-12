@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Услуги')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.price.direction.index') }}">Направления</a></li>
    <li class="breadcrumb-item active">Услуги</li>
@endsection
@section('headerStyle')
    <link href="{{ URL::asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        table.dataTable.nowrap th, table.dataTable.nowrap td{
            white-space: normal;
        }
    </style>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Добавить группу услуг</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-plus"></i> Добавить услугу</button>
            <a href="{{ route('admin.price.service.code_disable') }}" onclick="return confirm('Отключить показ всего кода?')" class="btn btn-danger">Быстро отключить показ кода</a>
            <a href="{{ route('admin.price.service.code_enable') }}" onclick="return confirm('Включить код?')" class="btn btn-success">Быстро включить показ кода</a>
        </div>
        <div class="card-body">
            <table id="datatable" data-page-length='15' class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Код услуги</th>
                    <th>Название услуги</th>
                    <th>Стоимость, руб.</th>
                    <th>Стоимость со скидкой, руб.</th>
                    <th>Группа услуг</th>
                    <th>Направление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'code')">{{ $service->code }}</div></td>
                        <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'name')">{{ $service->name }}</div></td>
                        <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'price')">{{ $service->price }}</div></td>
                        <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'discount_price')">{{ $service->discount_price }}</div></td>
                        <td>
                            @if($service->parent_id > 0)
                                {{ $service->parent->name }}
                            @endif
                        </td>
                        <td style="min-width: 400px">
                            @if(is_null($service->parent) and isset($service->directions[0]))
                                {{ $service->directions[0]->name }}
                            @elseif(!is_null($service->parent))
                                {{ $service->parent->directions[0]->name }}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Код услуги</th>
                    <th>Название услуги</th>
                    <th>Стоимость, руб.</th>
                    <th>Стоимость со скидкой, руб.</th>
                    <th>Группа услуг</th>
                    <th>Направление</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@stop

@section('footerScript')
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
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

    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить группу услуг</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="save_form" action="{{ route('admin.price.category.store') }}" method="post">
                        @csrf
{{--                        <input type="hidden" name="pricedirection_id" value="{{ $direction->id }}">--}}
                        <div class="form-group">
                            <label>Наименование</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Направление</label>
                            <select class="form-control" name="pricedirection_id" required>
                                <option value="">Выберите направление</option>
                                @foreach($directions as $direction)
                                    <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnSave" type="button" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить услугу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="save_form2" action="{{ route('admin.price.service.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="pricedirection_id" value="{{ $direction->id }}">
                        <input type="hidden" name="type" value="2">
                        <div class="form-group">
                            <label>Код</label>
                            <input class="form-control" type="text" name="code">
                        </div>
                        <div class="form-group">
                            <label class="required">Наименование</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Группа услуг</label>
                            <select class="form-control" name="parent_id" required>
                                <option value="">Выберите группу услуг</option>
                                @foreach($groups_services as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Цена</label>
                            <input class="form-control" type="text" name="price">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnSave2" type="button" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить услугу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="save_form2" action="{{ route('admin.price.service.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Код</label>
                            <input class="form-control" type="text" name="code">
                        </div>
                        <div class="form-group">
                            <label class="required">Наименование</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label class="required">Категория</label>
                            <select class="form-control" name="" required>
                                <option value="">Выберите категорию</option>
                                --}}{{--@foreach($all_cats as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach--}}{{--
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Цена</label>
                            <input class="form-control" type="text" name="price">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnSave2" type="button" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>--}}

    <script>
        $('#btnSave').click(function (){
            if ($('#save_form').find('input[name="name"]').val() === ''){
                $('#save_form').find('input[name="name"]').css('borderColor', 'red');
                return;
            }

            if ($('#save_form').find('select').val() === ''){
                $('#save_form').find('select').css('borderColor', 'red');
                return;
            }

            $('#save_form').submit();
        });
        $('#btnSave2').click(function (){

            if ($('#save_form2').find('input[name="name"]').val() === ''){
                $('#save_form2').find('input[name="name"]').css('borderColor', 'red');
                return;
            }
            if ($('#save_form2').find('select').val() === ''){
                $('#save_form2').find('select').css('borderColor', 'red');
                return;
            }

            $('#save_form2').submit();
        });
    </script>
@stop
