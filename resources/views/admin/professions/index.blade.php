@extends('admin.layouts.app')

@section('title', 'Специальности')
@section('pageName', 'Список специальностей')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Список специальностей</li>
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
                    <th>Специализация</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($professions as $profession)
                    <tr>
                        <td>
                            <p class="d-inline-block align-middle mb-0">
                                <a href="" class="d-inline-block align-middle mb-0 product-name">{{ $profession->name }}</a>
                            </p>
                        </td>

                        <td>
                            <a target="_blank" href="{{ route('front.doctors.professions', ['profession' => $profession->slug]) }}"><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.doctors.professions.edit', ['profession' => $profession->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.doctors.professions.destroy', ['profession' => $profession->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $profession->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $profession->id }}" action="{{ route('admin.doctors.professions.destroy', ['profession' => $profession->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $professions->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
