@extends('admin.layouts.app')

@section('title', 'Наши врачи')

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
                    <th>Специализация</th>
                    <th>Услуги</th>
                    <th>Высшая категория</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($doctors as $doctor)
                    <tr>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $doctor->name }}</a>
                            </p>
                        </td>
                        <td>
                            @foreach($doctor->professions as $profession)
                                <span class="badge badge-secondary">{{ $profession->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @foreach($doctor->services as $service)
                                <span class="badge badge-secondary">{{ $service->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($doctor->level == '1') <span class="badge badge-success">Да</span>
                            @elseif($doctor->level == '0') <span class="badge badge-warning">Нет</span> @endif
                        </td>
                        <td>
                            <a href=""><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.doctors.doctors.edit', ['doctor' => $doctor->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.doctors.doctors.destroy', ['doctor' => $doctor->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $doctor->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $doctor->id }}" action="{{ route('admin.doctors.doctors.destroy', ['doctor' => $doctor->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $doctors->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
