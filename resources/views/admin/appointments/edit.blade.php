@extends('admin.layouts.app')

@section('title', 'Запись на приём')
@section('pageName', 'Запись на приём редактируем')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Запись на приём редактируем</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.home.home.appointments.update', ['appointment' => $appointment->id]) }}" method="post">
                @method('PUT')
                @csrf
                    <div class="row">

                        <div class="form-group col-sm-12">
                            <label>Имя</label>
                            <input class="form-control" type="text" name="name" value="{{ $appointment->name }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Телефон*</label>
                            <input class="form-control" type="text" name="phone" value="{{ $appointment->phone }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Категория</label>
                            <select name="cat_servise_id" class="form-control">
                                @foreach($categories as $category)
                                    <?php
                                    if ($category->id == $appointment->cat_servise->id){
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
                                    if ($service->id == $appointment->service->id){
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
                                    if ($doctor->id == $appointment->doctor->id){
                                        $selected = ' selected';
                                    }else{ $selected = ''; }
                                    ?>
                                    <option value="{{ $doctor->id }}"{{ $selected }}>{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>День</label>
                            <input class="form-control" type="date" name="day" value="{{ $appointment->day }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Время</label>
                            <input class="form-control" type="text" name="time" value="{{ $appointment->time }}">
                        </div>
                    </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')

@stop
