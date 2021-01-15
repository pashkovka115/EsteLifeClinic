@extends('admin.layouts.app')

@section('title', 'Заявки на онлайн консультацию')
@section('pageName', 'Заявки на онлайн консультацию')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Заявки на онлайн консультацию</li>
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
                @foreach($onlines as $online)
                    <tr>
                        <td>{{ $online->name }}</td>
                        <td>{{ $online->phone }}</td>
                        <td>{{ $online->cat_servise->name }}</td>
                        <td>{{ $online->service->name }}</td>
                        <td>{{ $online->doctor->name }}</td>
                        <td>{{ $online->date }}/{{ $online->time }}</td>
                        <td>
                            <a href="{{ route('admin.home.home.online.edit', ['online' => $online->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.home.home.online.destroy', ['online' => $online->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $online->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $online->id }}" action="{{ route('admin.home.home.online.destroy', ['online' => $online->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $onlines->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
