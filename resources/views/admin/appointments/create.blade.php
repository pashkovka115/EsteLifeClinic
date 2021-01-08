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
                            <select name="cat_servise_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Услуга</label>
                            <select name="service_id" class="form-control">
                                @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Врач</label>
                            <select name="doctor_id" class="form-control">
                                @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Дата</label>
                            <input class="form-control" type="text" name="date" value="{{ old('date') }}">
                        </div>
                    </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')

@stop
