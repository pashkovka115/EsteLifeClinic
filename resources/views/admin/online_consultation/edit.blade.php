@extends('admin.layouts.app')

@section('title', 'Запись на онлайн консультацию')
@section('pageName', 'Запись на онлайн консультацию редактируем')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Запись на онлайн консультацию редактируем</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.home.home.online.update', ['online' => $online->id]) }}" method="post">
                @method('PUT')
                @csrf
                    <div class="row">

                        <div class="form-group col-sm-12">
                            <label>Имя</label>
                            <input class="form-control" type="text" name="name" value="{{ $online->name }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Телефон*</label>
                            <input class="form-control" type="text" name="phone" value="{{ $online->phone }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Категория</label>
                            <select name="cat_servise_id" class="form-control">
                                @foreach($categories as $category)
                                    <?php
                                    if ($category->id == $online->cat_servise->id){
                                        $selected = ' selected';
                                    }else{ $selected = ''; }
                                    ?>
                                    <option value="{{ $category->id }}"{{ $selected }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Услуга</label>
                            <select name="service_id" class="form-control">
                                @foreach($services as $service)
                                    <?php
                                    if ($service->id == $online->service->id){
                                        $selected = ' selected';
                                    }else{ $selected = ''; }
                                    ?>
                                    <option value="{{ $service->id }}"{{ $selected }}>{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Врач</label>
                            <select name="doctor_id" class="form-control">
                                @foreach($doctors as $doctor)
                                    <?php
                                    if ($doctor->id == $online->doctor->id){
                                        $selected = ' selected';
                                    }else{ $selected = ''; }
                                    ?>
                                    <option value="{{ $doctor->id }}"{{ $selected }}>{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Дата</label>
                            <input class="form-control" type="date" name="date" value="{{ $online->date }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Время</label>
                            <select class="form-control" name="time">
                                <option value="">Желаемое время посещения</option>
                                @for($i = 8; $i <= 19; $i++)
                                    <?php
                                    $selected = '';
                                    $selected2 = '';
                                    if ($online->time == "$i:00"){
                                        $selected = ' selected';
                                    }elseif ($online->time == "$i:30"){
                                        $selected2 = ' selected';
                                    }
                                    ?>
                                    <option value="{{ $i }}:00"{{ $selected }}>{{ $i }} : 00</option>
                                    <option value="{{ $i }}:30"{{ $selected2 }}>{{ $i }} : 30</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')

@stop
