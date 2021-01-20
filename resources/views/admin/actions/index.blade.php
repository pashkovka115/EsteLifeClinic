@extends('admin.layouts.app')

@section('title', 'Список акций')
@section('pageName', 'Список акций')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список акций</li>
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
                    <th>Наименование</th>
                    <th>Тип</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($actions as $action)
                    <tr>
                        <td>{{ $action->name }}</td>
                        <td>{{ $action->type }}</td>
                        <td>
                            <a target="_blank" href="{{ route('front.actions.show', ['slug' => $action->slug]) }}"><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.content.actions.actions.edit', ['action' => $action->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.content.actions.actions.destroy', ['action' => $action->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $action->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $action->id }}" action="{{ route('admin.content.actions.actions.destroy', ['action' => $action->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $actions->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
