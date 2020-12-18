@extends('admin.layouts.app')

@section('title', 'Общие настройки')

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
                    <th title="key">Ключ</th>
                    <th title="val">Значение</th>
                    <th title="val2">Дополнительное значение</th>
                    <th>Краткое описание</th>
                    <th>Редактировать</th>
                </tr>
                </thead>
                <tbody>
                @foreach($options as $option)
                    <tr>
                        <td>{{ $option->id }}</td>
                        <td>{{ $option->key }}</td>
                        <td>{{ $option->val }}</td>
                        <td>{{ $option->val2 }}</td>
                        <td>{{ mb_strimwidth($option->description, 0, 100, '...') }}</td>
                        <td>
                            <a href="{{ route('admin.options.options.edit', ['option' => $option->id]) }}">
                                <i class="far fa-edit text-warning mr-1"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $options->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop
