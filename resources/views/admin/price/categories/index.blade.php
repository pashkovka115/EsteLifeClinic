@extends('admin.layouts.app')

@section('title', 'Категории')
@section('pageName', $direction->name .' / Категории')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="{{ route('admin.price.direction.index') }}">Направления</a></li>
<li class="breadcrumb-item active">Категории</li>
@endsection
@section('headerStyle')

@stop

@section('content')

<div class="card">
    <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Добавить группу услуг</button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2"><i class="fas fa-plus"></i> Добавить услугу</button>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Количество услуг</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                @php
                    $cnt = $service->children->count();
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($cnt > 0)
                            <i class="fas fa-plus"></i> <a href="{{ route('admin.price.service.index', ['category_id' => $service->id]) }}">{{ $service->name }}</a>
                        @else
                            {{ $service->name }}
                        @endif
                    </td>
                    <td>{{ $cnt }}</td>
                    <td>
                        <a href="{{ route('admin.price.category.edit', ['id' => $service->id]) }}"><i
                                class="far fa-edit text-warning mr-1"></i></a>
                        <a href="{{ route('admin.price.category.destroy', ['id' => $service->id]) }}"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $service->id }}').submit(); return false;">
                            <i class="fas fa-trash-alt text-danger"></i></a>
                        <form id="form_{{ $service->id }}" action="{{ route('admin.price.category.destroy', ['id' => $service->id]) }}" method="POST" style="display: none;">
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

@stop

@section('footerScript')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Добавить группу услуг</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="save_form" action="{{ route('admin.price.category.store') }}" method="post">
                @csrf
                <input type="hidden" name="pricedirection_id" value="{{ $direction->id }}">
                <div class="form-group">
                    <label>Наименование</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label>Направление</label>
                    <select class="form-control" name="pricedirection_id" required>
                        <option value="">Выберите направление</option>
                        @foreach($directions as $direction)
                            <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                        @endforeach
                    </select>
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

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Добавить услугу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="save_form2" action="{{ route('admin.price.service.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Код</label>
                        <input class="form-control" type="text" name="code">
                    </div>
                    <div class="form-group">
                        <label class="required">Наименование</label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label class="required">Категория</label>
                        <select class="form-control" name="" required>
                            <option value="">Выберите категорию</option>
                            {{--@foreach($all_cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach--}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Цена</label>
                        <input class="form-control" type="text" name="price">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnSave2" type="button" class="btn btn-primary">Добавить</button>
                <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>

    <script>
        $('#btnSave').click(function (){
            if ($('#save_form').find('input[name="name"]').val() === ''){
                $('#save_form').find('input[name="name"]').css('borderColor', 'red');
                return;
            }

            if ($('#save_form').find('select').val() === ''){
                $('#save_form').find('select').css('borderColor', 'red');
                return;
            }

            $('#save_form').submit();
        });
        $('#btnSave2').click(function (){

            if ($('#save_form2').find('input[name="name"]').val() === ''){
                $('#save_form2').find('input[name="name"]').css('borderColor', 'red');
                return;
            }
            if ($('#save_form2').find('select').val() === ''){
                $('#save_form2').find('select').css('borderColor', 'red');
                return;
            }

            $('#save_form2').submit();
        });
    </script>
@stop
