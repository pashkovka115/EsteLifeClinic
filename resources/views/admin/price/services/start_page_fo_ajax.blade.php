@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Услуги')
@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.price.direction.index') }}">Направления</a></li>
    <li class="breadcrumb-item active">Услуги</li>
@endsection
@section('headerStyle')
    <link href="{{ URL::asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
@stop

@section('content')

    <div class="card">
        {{--<div class="card-header">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>
                Добавить услугу
            </button>
        </div>--}}
        <div class="card-body">
            <table id="datatable" data-page-length='15' class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Код услуги</th>
                    <th>Название услуги</th>
                    <th>Стоимость, руб.</th>
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
                        <td>{{ $service->category->name }}</td>
                        <td>{{ $service->category->direction->name }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Код услуги</th>
                    <th>Название услуги</th>
                    <th>Стоимость, руб.</th>
                    <th>Группа услуг</th>
                    <th>Направление</th>
                </tr>
                </tfoot>
            </table>
            {{--        {{ $services->links('pagination::bootstrap-4') }}--}}
        </div>
    </div>
    {{--<input type="text">--}}
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
@stop
