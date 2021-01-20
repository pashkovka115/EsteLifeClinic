@extends('admin.layouts.app')

@section('title', 'Отзывы')
@section('pageName', 'Список отзывов')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список отзывов</li>
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
                    <th>Отзыв</th>
                    <th>Проверен</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviws as $reviw)
                    <tr>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $reviw->name }}</a>
                            </p>
                        </td>
                        <td>{{ $reviw->phone }}</td>
                        <td>
                            {{ $reviw->category->name }}
                        </td>
                        <td>
                            {{ mb_strimwidth($reviw->content, 0, 150, '...') }}
                        </td>
                        <td>
                            @if($reviw->visibility == '0') <span class="badge badge-danger">Нет</span> @elseif($reviw->visibility == '1') <span class="badge badge-success">Да</span> @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.content.reviews.reviews.edit', ['review' => $reviw->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.content.reviews.reviews.destroy', ['review' => $reviw->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $reviw->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $reviw->id }}" action="{{ route('admin.content.reviews.reviews.destroy', ['review' => $reviw->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $reviws->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
