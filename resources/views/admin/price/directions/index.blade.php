@extends('admin.layouts.app')

@section('title', 'Направления')
@section('pageName', 'Направления')
@section('breadcrumbs')
<li class="breadcrumb-item active">Направления</li>
@endsection
@section('headerStyle')

@stop

@section('content')

<div class="card">
    <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Добавить направление</button>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($directions as $direction)
                <tr>
                    <td><a href="{{ route('admin.price.category.index', ['direction_id' => $direction->id]) }}">{{ $direction->name }}</a></td>
                    <td>
                        <a href="{{ route('admin.price.direction.edit', ['direction' => $direction->id]) }}"><i
                                class="far fa-edit text-warning mr-1"></i></a>
                        <a href="{{ route('admin.price.direction.destroy', ['direction' => $direction->id]) }}"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $direction->id }}').submit(); return false;">
                            <i class="fas fa-trash-alt text-danger"></i></a>
                        <form id="form_{{ $direction->id }}" action="{{ route('admin.price.direction.destroy', ['direction' => $direction->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $directions->links('pagination::bootstrap-4') }}
    </div>
</div>

@stop

@section('footerScript')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Добавить направление услуг</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="save_form" action="{{ route('admin.price.direction.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Наименование</label>
                    <input class="form-control" type="text" name="name">
                </div>
            </form>
        </div>
          <div class="modal-footer">
              <button id="btnSave" type="button" class="btn btn-primary">Добавить</button>
              <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
          </div>
      </div>
    </div>
  </div>
    <script>
        $('#btnSave').click(function (){
            $('#save_form').submit();
        });
    </script>
@stop
