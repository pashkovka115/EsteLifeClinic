@extends('admin.layouts.app')

@section('title', 'Профиль администратора')
@section('pageName', 'Профиль администратора')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Профиль администратора</li>
@endsection
@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.administrator.administrator.update', ['administrator' => $admin->id]) }}" method="post">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="text-input-name">Имя</label>
                    <input class="form-control" type="text" name="name" value="{{ $admin->name }}"
                           id="text-input-name">
                </div>

                <div class="form-group">
                    <label for="text-input-name">E-mail</label>
                    <input class="form-control" type="email" name="email" value="{{ $admin->email }}"
                           id="text-input-name">
                </div>

                <div class="form-group">
                    <label for="text-input-name">Новый пароль</label>
                    <input class="form-control" type="password" name="password2" placeholder="Оставьте пустым если не надо менять">
                </div>

                <div class="form-group">
                    <label for="text-input-name">Повторите новый пароль</label>
                    <input class="form-control" type="password" name="password3" placeholder="Оставьте пустым если не надо менять">
                </div>

                <div class="form-group">
                    <label for="text-input-name">Для изменения любых данных необходимо ввести действующий пароль</label>
                    <input class="form-control" type="password" name="password1">
                </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>

@stop

@section('footerScript')

@stop
