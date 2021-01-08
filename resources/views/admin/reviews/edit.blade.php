@extends('admin.layouts.app')

@section('title', 'Отзывы')
@section('pageName', 'Редактировать отзыв')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Редактировать отзыв</li>
@endsection

@section('headerStyle')

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.content.reviews.reviews.update', ['review' => $review->id]) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text-input-name">Имя</label>
                                        <input class="form-control" type="text" name="name" value="{{ $review->name }}"
                                               id="text-input-name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="text-input-phone">Телефон</label>
                                        <input class="form-control" type="text" name="phone" value="{{ $review->phone }}"
                                               id="text-input-phone">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Категория</label>
                                    <select name="cat_service_id" class="form-control">
                                        @foreach($categories as $category)
                                            <?php
                                            if ($category->id == $review->category->id){
                                                $selected = ' selected';
                                            }else{ $selected = ''; }
                                            ?>
                                        <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="checkbox my-2">
                            <div class="custom-control custom-checkbox">
                                <?php
                                if ($review->visibility == '1'){
                                    $checked = ' checked';
                                }else{ $checked = ''; }
                                ?>
                                <input type="checkbox" name="visibility" class="custom-control-input"{{ $checked }} id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="custom-control-label" for="customCheck3">Проверен</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="elm1">Отзыв</label>
                    <textarea name="content" class="form-control" rows="5"
                              id="elm1">{{ $review->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


@stop

@section('footerScript')

@stop
