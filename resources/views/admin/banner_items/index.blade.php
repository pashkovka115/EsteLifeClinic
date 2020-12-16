@extends('admin.layouts.app')

@section('title', 'Баннер - элементы')

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.options.banners.banner.item.create', ['id' => $banner->id]) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Добавить</a>
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Краткое описание</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ mb_strimwidth($item->description, 0, 120, '...') }}</td>

                        <td>
                            <a href="{{ route('admin.options.banners.banner.item.edit', ['id' => $item->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.options.banners.banner.item.destroy', ['id' => $item->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $item->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $item->id }}" action="{{ route('admin.options.banners.banner.item.destroy', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('footerScript')

@stop
