@extends('admin.layouts.app')

@section('title', 'Заявки на приём')
@section('pageName', 'Заявки на приём')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Заявки на приём</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Категория</th>
                    <th>Услуга</th>
                    <th>Врач</th>
                    <th>Желаемые день/время</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>
                            @if($appointment->cat_servise)
                            {{ $appointment->cat_servise->name }}
                            @endif
                        </td>
                        <td>
                            @if($appointment->service)
                            {{ $appointment->service->name }}
                            @endif
                        </td>
                        <td>
                            @if($appointment->doctor)
                            {{ $appointment->doctor->name }}
                            @endif
                        </td>
                        <td>{{ $appointment->date }}/{{ $appointment->time }}</td>
                        <td>
                            <a href="{{ route('admin.home.home.appointments.edit', ['appointment' => $appointment->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.home.home.appointments.destroy', ['appointment' => $appointment->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $appointment->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $appointment->id }}" action="{{ route('admin.home.home.appointments.destroy', ['appointment' => $appointment->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $appointments->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
