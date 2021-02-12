@extends('admin.layouts.app')

@section('title', 'Категория услуг')
@section('pageName', 'Список категорий услуг')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список категорий услуг</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.services.categories.create') }}" class="btn btn-primary text-white"><i class="fas fa-plus"></i> Добавить категорию</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Тип</th>
{{--                    <th>Описание</th>--}}
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <td>{{ $cat->name }}</td>
                        <td>
                            @if($cat->type == 'cosmetology')
                                Косметология
                            @elseif($cat->type == 'medicine')
                                Медицина
                            @endif
                        </td>
{{--                        <td>{{ $cat->description }}</td>--}}
                        <td>
                            <a href="{{ route('admin.services.categories.edit', ['category' => $cat->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.services.categories.destroy', ['category' => $cat->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $cat->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $cat->id }}" action="{{ route('admin.services.categories.destroy', ['category' => $cat->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $cats->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
