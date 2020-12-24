@extends('admin.layouts.app')

@section('title', 'Страницы')
@section('pageName', 'Список страниц')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список страниц</li>
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
                    <th>Заголовок</th>
                    <th>Краткое описание</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->name }}</td>
                        <td>{{ mb_strimwidth($page->content, 0, 150, '...') }}</td>
                        <td>
                            <a href=""><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.pages.pages.edit', ['page' => $page->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.pages.pages.destroy', ['page' => $page->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $page->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $page->id }}" action="{{ route('admin.pages.pages.destroy', ['page' => $page->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $pages->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
