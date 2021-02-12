@extends('admin.layouts.app')

@section('title', 'Редактируем категорию')
{{--@section('pageName', $category->direction->name . ' / Редактируем категорию')--}}
@section('breadcrumbs')
{{--<li class="breadcrumb-item"><a href="{{ route('admin.price.category.index', ['direction_id' => $category->direction->id]) }}">{{ $category->direction->name }}</a></li>--}}
<li class="breadcrumb-item active">Редактируем категорию</li>
@endsection
@section('headerStyle')

@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.price.category.update', ['id' => $service->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Наименование</label>
                <input class="form-control" type="text" name="name" value="{{ $service->name }}">
            </div>

            <div class="form-group">
                <label>Направление</label>
                <select class="form-control" name="pricedirection_id">
                    @foreach($directions as $direction)
                        <?php
                        $selected = '';
                        // пока выбор только одного направления
                        if ($direction->id == $service->directions[0]->id){
                            $selected = ' selected';
                        }
                        ?>
                    <option value="{{ $direction->id }}"{{ $selected }}>{{ $direction->name }}</option>
                    @endforeach
                </select>
            </div>
{{--            Если это услуга --}}
            @if($service->type == 2)
            <div class="form-group">
                <label>Группа услуг</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Без группы</option>
                    @foreach($group_services as $group_serv)
                        <?php
                        $selected = '';
                        // пока выбор только одного направления
                        if ($group_serv->id == $service->directions[0]->id){
                            $selected = ' selected';
                        }
                        ?>
                    <option value="{{ $group_serv->id }}"{{ $selected }}>{{ $group_serv->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Цена</label>
                <input class="form-control" type="text" name="price" value="{{ $service->price }}">
            </div>

            <div class="form-group">
                <label>Цена со скидкой</label>
                <input class="form-control" type="text" name="discount_price" value="{{ $service->discount_price }}">
            </div>
            @endif

            <div class="form-group">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>

@stop

{{-- pricedirection_id --}}

@section('footerScript')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select[name="pricedirection_id"]').on('change', function (){
        $.ajax({
            method: 'POST',
            url: '{{ route('admin.price.category.edit_ajax') }}',
            data: {
                pricedirection_id: $('select[name="pricedirection_id"]').val()
            },
            success: function (resp){
                // console.log(JSON.parse(resp))
                var data = JSON.parse(resp);
                var select = $('select[name="parent_id"]');
                select.empty();
                select.append('<option value="0">Без группы</option>');

                for (var i = 0; i < data.length; i++){
                    select.append('<option value="'+ data[i].id +'">'+ data[i].name +'</option>');
                }
            }
        });
    });

</script>
@endsection

