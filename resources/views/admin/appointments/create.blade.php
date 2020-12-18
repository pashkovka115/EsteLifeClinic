@extends('admin.layouts.app')

@section('title', 'Записать на приём')
@section('pageName', 'Записать на приём')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Запись на приём</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.home.home.appointments.store') }}" method="post">
                @csrf
                    <div class="row">

                        <div class="form-group col-sm-12">
                            <label>Имя</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Телефон*</label>
                            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Категория</label>
                            <input class="form-control" type="text" name="cat_servise" value="{{ old('cat_servise') }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Услуга</label>
                            <input class="form-control" type="text" name="service" value="{{ old('service') }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Врач</label>
                            <input class="form-control" type="text" name="doctor" value="{{ old('doctor') }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>День</label>
                            <input class="form-control" type="date" name="day" value="{{ old('day') }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Время</label>
                            <input class="form-control" type="text" name="time" value="{{ old('time') }}">
                        </div>
                    </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')

@stop
