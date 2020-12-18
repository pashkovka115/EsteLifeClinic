@extends('admin.layouts.app')

@section('title', 'Запись на приём')
@section('pageName', 'Запись на приём')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Запись на приём</li>
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
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Категория</th>
                    <th>Услуга</th>
                    <th>Врач</th>
                    <th>Желаемые день/время</th>
                    <th>Дата создания</th>
                    <th>Дата обновления</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ $appointment->cat_servise }}</td>
                        <td>{{ $appointment->service }}</td>
                        <td>{{ $appointment->doctor }}</td>
                        <?php $date = new DateTime($appointment->day); ?>
                        <td>{{ $date->format('d_m_Y') }} - {{ $appointment->time }}</td>
                        <?php $date2 = new DateTime($appointment->created_at); ?>
                        <td>{{ $date2->format('d_m_Y H:i:s') }}</td>
                        <?php $date3 = new DateTime($appointment->updated_at); ?>
                        <td>{{ $date3->format('d_m_Y H:i:s') }}</td>
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
