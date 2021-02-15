@extends('admin.layouts.app')

@section('title', 'Новая цена')

@section('pageName', 'Новая цена')

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.price.service.all_services') }}">Цены</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.price.direction.index') }}">Направления</a></li>
    {{--<li class="breadcrumb-item">
        <a href="{{ route('admin.price.category.index', ['direction_id' => $service->category->direction->id]) }}">{{ $service->category->direction->name }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('admin.price.service.index', ['category_id' => $service->category->id]) }}">{{ $service->category->name }}</a>
    </li>--}}
    <li class="breadcrumb-item active">Новая цена</li>
@endsection

@section('headerStyle')

@stop

@section('content')
<div class="row">

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3>Добавить услугу</h3>
            </div>
            <div class="card-body">
                <form id="add_service" action="{{ route('admin.price.service.store_new_service') }}" method="post">
            @csrf
                    <input type="hidden" name="type" value="2">
            <div class="form-group">
                <label class="required">Наименование</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Код</label>
                <input class="form-control" type="text" name="code" value="{{ old('code') }}">
            </div>

            <div class="form-group">
                <label>Цена, руб.</label>
                <input class="form-control" type="text" name="price" value="{{ old('price') }}">
            </div>

            <div class="form-group">
                <label>Цена со скидкой, руб.</label>
                <input class="form-control" type="text" name="discount_price" value="{{ old('discount_price') }}">
            </div>

            <div class="form-group">
                <label class="required">Направление</label>
                <select class="form-control" name="pricedirection_id" required>
                    @foreach($directions as $direction)
                        <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Группа</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Без группы</option>
                    @foreach($groups_services as $group_serv)
                        <option value="{{ $group_serv->id }}">{{ $group_serv->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Сохранить и добавить новую</button>
            </div>
        </form>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3>Добавить группу услугу</h3>
            </div>
            <div class="card-body">
        <form action="{{ route('admin.price.service.store_new_service') }}" method="post">
            @csrf
            <input type="hidden" name="parent_id" value="0">
            <input type="hidden" name="type" value="1">
            <div class="form-group">
                <label class="required">Наименование</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label class="required">Направление</label>
                <select class="form-control" name="pricedirection_id" required>
                    @foreach($directions as $direction)
                        <option value="{{ $direction->id }}">{{ $direction->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Сохранить и добавить новую</button>
            </div>
        </form>
            </div>
        </div>
    </div>

</div>

@stop

@section('footerScript')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#add_service select[name="pricedirection_id"]').on('change', function (){
            var select_group = $('#add_service select[name="parent_id"]');

            $.ajax({
                url: '{{ route('admin.price.category.get_group_service_ajax') }}',
                method: 'POST',
                data: {
                    pricedirection_id: $(this).val()
                },
                success: function (resp){
                    var cats = JSON.parse(resp);

                    select_group.empty();
                    select_group.append('<option value="0">Без группы</option>');

                    for (var i =0; i < cats.length; i++){
                        console.log(cats[i])
                        select_group.append('<option value="'+ cats[i].id +'">'+ cats[i].name +'</option>');
                    }
                }
            });
        });
    </script>
@endsection
