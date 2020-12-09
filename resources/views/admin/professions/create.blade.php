@extends('admin.layouts.app')

@section('title', 'Наши врачи')

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.doctors.professions.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">Специальность</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                   id="text-input-name">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>

@stop

@section('footerScript')

@stop
