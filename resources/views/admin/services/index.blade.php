@extends('admin.layouts.app')

@section('title', 'Услуги')
@section('pageName', 'Список услуг')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список услуг</li>
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
                    <th>Тип</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $service->name }}</a>
                            </p>
                        </td>
                        <td>
                            @php
                                $a = ['cosmetology' => 'Косметология', 'medicine' => 'Медицина'];
                            @endphp
                            {{ $a[$service->category->type] }}
                        </td>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $service->category->name }}</a>
                            </p>
                        </td>
                        <td>
                            {{ $service->price }}
                        </td>

                        <td>
                            <a target="_blank" href="{{ route('front.service.show', ['slug' => $service->slug]) }}"><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.services.services.edit', ['service' => $service->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.services.services.destroy', ['service' => $service->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $service->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $service->id }}" action="{{ route('admin.services.services.destroy', ['service' => $service->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $services->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
