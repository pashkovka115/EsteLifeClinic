@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Список услуг')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список услуг</li>
@endsection

@section('headerStyle')
    <link href="{{ URL::asset('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.services.services.create') }}" class="btn btn-primary text-white"><i class="fas fa-plus"></i> Добавить услугу</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Тип</th>
                    <th>Категория</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'name')">{{ $service->name }}</div></td>
                        <td>{{ $all_types[$service->category->type] }}</td>
                        <td>{{ $service->category->name }}</td>
                        <td>
                            <a target="_blank" href="{{ route('front.service.show', ['slug' => $service->slug]) }}"><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.services.services.edit', ['service' => $service->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.services.services.destroy', ['service' => $service->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $service->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $service->id }}" action="{{ route('admin.services.services.destroy', ['service' => $service->id]) }}" method="POST" style="display: none;">
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
                    url: '{{ route('admin.services.services.update_ajax') }}',
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
