@extends('admin.layouts.app')

@section('title', 'Новости')
@section('pageName', 'Список новостей')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список новостей</li>
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
                    <th>Категория</th>
                    <th>Контент</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            {{ mb_strimwidth(strip_tags($post->content), 0, 100, '...') }}
                        </td>

                        <td>
                            <a target="_blank" href="{{ route('front.news.show', ['slug' => $post->slug]) }}"><i class="far fa-eye text-primary mr-1"></i></a>
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
