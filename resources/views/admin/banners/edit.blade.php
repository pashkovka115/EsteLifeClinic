@extends('admin.layouts.app')

@section('title', 'Баннер')
@section('pageName', 'Редактировать баннер')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Редактировать баннер</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.options.banners.list.update', ['banner' => $banner->id]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text-input-name">Наименование</label>
                                        <input class="form-control" type="text" name="name" value="{{ $banner->name }}"
                                               id="text-input-name">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 mt-4">
                        <div class="checkbox">
                            <div class="custom-control custom-checkbox">
                                <?php
                                if ($banner->visibility == '1'){
                                    $checked = ' checked';
                                }else{ $checked = ''; }
                                ?>
                                <input type="checkbox" name="visibility" class="custom-control-input"{{ $checked }} id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="custom-control-label" for="customCheck3">Включено</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-4">
                        <a href="{{ route('admin.options.banners.banner.items', ['id' => $banner->id]) }}" class="card-link">Перейти к элементам</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')

@stop
