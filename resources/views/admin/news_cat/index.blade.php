@extends('admin.layouts.app')

@section('title', 'Категории новостей')
@section('pageName', 'Список категорий новостей')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список категорий новостей</li>
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
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>

                        <td>
                            <a href="">{{ mb_strimwidth($category->content, 0, 100, '...') }}</a>
                        </td>
                        <td>
                            <a href=""><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.pages.category.news.edit', ['news' => $category->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.pages.category.news.destroy', ['news' => $category->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $category->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $category->id }}" action="{{ route('admin.pages.category.news.destroy', ['news' => $category->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
