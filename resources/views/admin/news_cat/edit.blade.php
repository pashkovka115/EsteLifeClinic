@extends('admin.layouts.app')

@section('title', 'Категории новостей')
@section('pageName', 'Редактировать категорию новостей')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Редактировать категорию новостей</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.pages.category.news.update', ['news' => $category->id]) }}"
                  method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">Наименование</label>
                            <input class="form-control" type="text" name="name" value="{{ $category->name }}"
                                   id="text-input-name">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">Title</label>
                            <input class="form-control" type="text" name="title" value="{{ $category->title }}"
                                   id="text-input-name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">META Description</label>
                            <textarea class="form-control" name="meta_description">{{ $category->meta_description }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="text-input-name">META Keywords</label>
                            <textarea class="form-control" name="keywords">{{ $category->keywords }}</textarea>
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
