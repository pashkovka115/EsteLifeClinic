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
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Категория</th>
                    <th>Контент</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $post->id }}</a>
                            </p>
                        </td>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $post->name }}</a>
                            </p>
                        </td>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $post->category->name }}</a>
                            </p>
                        </td>
                        <td>
                            {{ mb_strimwidth($post->content, 0, 100, '...') }}
                        </td>

                        <td>
                            <a href=""><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.pages.news.edit', ['news' => $post->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.pages.news.destroy', ['news' => $post->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $post->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $post->id }}" action="{{ route('admin.pages.news.destroy', ['news' => $post->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
