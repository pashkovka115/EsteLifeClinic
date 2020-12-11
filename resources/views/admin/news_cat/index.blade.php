@extends('admin.layouts.app')

@section('title', 'Категории постов')
@section('pageName', 'Категории')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Категории</li>
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
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $category->id }}</a>
                            </p>
                        </td>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $category->name }}</a>
                            </p>
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
