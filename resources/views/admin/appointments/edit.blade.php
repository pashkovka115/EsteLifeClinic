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

                        @if(!is_null($appointment->cat_servise))
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
                        @endif

                        @if(!is_null($appointment->cat_servise))
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
                        @endif

                        @if(!is_null($appointment->doctor))
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
                        @endif

                        <div class="form-group col-sm-12">
                            <label>Дата</label>
                            <input class="form-control" type="date" name="date" value="{{ $appointment->date }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Время</label>
                            <select class="form-control" name="time">
                                <option value="">Желаемое время посещения</option>
                                @for($i = 8; $i <= 19; $i++)
                                    <?php
                                    $selected = '';
                                    $selected2 = '';
                                    if ($appointment->time == "$i:00"){
                                        $selected = ' selected';
                                    }elseif ($appointment->time == "$i:30"){
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
