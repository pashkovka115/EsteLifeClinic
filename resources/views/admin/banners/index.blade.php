@extends('admin.layouts.app')

@section('title', 'Баннеры')
@section('pageName', 'Список баннеров')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список баннеров</li>
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
                    <th>Действия с баннером</th>
                    <th>Действия с элементами</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banners as $banner)
                    <tr>
                        <td>{{ $banner->name }}</td>
                        <td>
                            <a href="{{ route('admin.options.banners.list.edit', ['banner' => $banner->id]) }}">
                                <i class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.options.banners.list.destroy', ['banner' => $banner->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $banner->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $banner->id }}" action="{{ route('admin.options.banners.list.destroy', ['banner' => $banner->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.options.banners.banner.items', ['id' => $banner->id]) }}">
                                <i class="far fa-edit text-warning mr-1"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $banners->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
