@extends('admin.layouts.app')

@section('title', 'Услуги')

@if($parent_type == 1)
@section('pageName', $parent_name . ' / Услуги')
@else
@section('pageName', $parent_name . ' / Услуги')
@endif

@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('admin.price.direction.index') }}">Направления</a></li>
@if($parent_type == 1)
<li class="breadcrumb-item"> {{ $parent_name }} </li>
@endif
<li class="breadcrumb-item active">Услуги</li>
@endsection

@section('headerStyle')
<style>
    .minw100{
        min-width: 50px;
        min-height: 10px;
    }
</style>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Добавить услугу</button>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Код услуги</th>
                <th>Название</th>
                <th>Стоимость, руб.</th>
                <th>Стоимость со скидкой, руб.</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'code')">{{ $service->code }}</div></td>
                    <td>
                        <div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'name')">{{ $service->name }}</div>
                    </td>
                    <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'price')">{{ $service->price }}</div></td>
                    <td><div class="minw100" ondblclick="onCode(this, {{ $service->id }}, 'discount_price')">{{ $service->discount_price }}</div></td>
                    <td>
                        <a href="{{ route('admin.price.service.destroy', ['id' => $service->id]) }}" title="Удалить"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $service->id }}').submit(); return false;">
                            <i class="fas fa-trash-alt text-danger"></i></a>
                        <form id="form_{{ $service->id }}" action="{{ route('admin.price.service.destroy', ['id' => $service->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{ $services->links('pagination::bootstrap-4') }}--}}
    </div>
</div>
{{--<input type="text">--}}
@stop

@section('footerScript')
    <style>
        .input-custom{
            padding: 5px;
            border-radius: 5px;
            text-align: center;
            width: 100%;
        }
    </style>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function onCode(el, id, field){
            el.innerHTML = '<input type="text" class="input-custom" value="'+ el.innerHTML +'">';
            $el = $(el).find('input').focus();
            $el.on('blur', function (){
                el.innerHTML = $el.val();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.price.service.update') }}',
                    data: {
                        id: id,
                        field: field,
                        data: el.innerHTML.trim()
                    }
                });
            })
        }
    </script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Добавить услугу</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="save_form" action="{{ route('admin.price.service.store') }}" method="post">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $parent_id }}">
                <input type="hidden" name="type" value="2">
                <input type="hidden" name="pricedirection_id" value="не нужен">
                <div class="form-group">
                    <label>Код</label>
                    <input class="form-control" type="text" name="code">
                </div>
                <div class="form-group">
                    <label class="required">Наименование</label>
                    <input class="form-control" type="text" name="name">
                </div>

                <div class="form-group">
                    <label>Цена</label>
                    <input class="form-control" type="text" name="price">
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
