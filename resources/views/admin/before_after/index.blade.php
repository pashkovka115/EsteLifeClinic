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
                    <th>Оказанная услуга</th>
                    <th>Специалист</th>
                    <th>Категория</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->doctor->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            @if($item->done)
                            <?php $date = DateTime::createFromFormat('Y-m-d', $item->done); ?>
                            {{ $date->format('d.m.Y') }}
                            @endif
                        </td>
                        <td>
                            <a href=""><i class="far fa-eye text-primary mr-1"></i></a>
                            <a href="{{ route('admin.before_after.before_after.edit', ['before_after' => $item->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.before_after.before_after.destroy', ['before_after' => $item->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $item->id }}').submit(); return false;">
                                                     <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $item->id }}" action="{{ route('admin.before_after.before_after.destroy', ['before_after' => $item->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $items->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop

@section('footerScript')

@stop