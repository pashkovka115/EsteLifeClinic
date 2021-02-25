@extends('admin.layouts.app')

@section('title', 'Домашняя страница')
@section('pageName', 'Домашняя страница')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Домашняя страница</li>
@endsection
@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.pages.home.update') }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Показывать врачей в списке</label>
                    <select name="count_doctors_list" class="form-control">
                        @for($i=3; $i<=23; $i++)
                            <?php
                            if (isset($home->count_doctors_list) and $home->count_doctors_list == $i){
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $i }}"{{ $selected }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                    <label>Показывать последних новостей в списке</label>
                    <select name="count_news" class="form-control">
                        @for($i=1; $i<=12; $i++)
                            <?php
                            if (isset($home->count_news) and $home->count_news == $i){
                                $selected = ' selected';
                            } else {
                                $selected = '';
                            }
                            ?>
                            <option value="{{ $i }}"{{ $selected }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Верхний баннер</h3>
            <button id="btnBannerTop" class="btn btn-primary" data-toggle="modal" data-target="#bannerTop"><i class="fas fa-plus"></i> Добавить изображение</button>
        </div>

        <div class="card-body">
            <table class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Элементы</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banner_home_top as $banner_home_top_item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ URL::asset('storage/' . $banner_home_top_item->img)}}" style="max-height: 80px; width: auto"></td>
                        <td>
                            <a href="{{ route('admin.pages.home.banner_home_top_edit', ['id' => $banner_home_top_item->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.pages.home.banner_home_top_destroy') }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $banner_home_top_item->id }}').submit(); return false;">
                                <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $banner_home_top_item->id }}" action="{{ route('admin.pages.home.banner_home_top_destroy') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $banner_home_top_item->id }}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Баннер акции</h3>
            <button class="btn btn-primary" data-toggle="modal" data-target="#bannerTop"><i class="fas fa-plus"></i> Добавить акцию в слайдер</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Акция</th>
                    <th>Изображение</th>
                    <th>#</th>
                    <th>Редактировать</th>
                </tr>
                </thead>
                <tbody>
                @foreach($actions as $action)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $action->name }}</td>
                        <td>
                            @if($action->show_home == '1' and $action->banner_img)
                            <img src="{{ URL::asset('storage/' . $action->banner_img)}}" style="max-height: 80px; width: auto">
                            @elseif(!$action->banner_img)
                            Нет изображения
                            @elseif($action->show_home == '0')
                            Отключено
                            @endif
                        </td>
                        <td>
                            <div class="custom-control custom-checkbox">
                                @php
                                $checked = '';
                                if ($action->show_home == '1'){
                                    $checked = ' checked';
                                }
                                @endphp
                                <input type="checkbox" class="custom-control-input" id="checkbox_{{ $action->id }}" onclick="update_status('checkbox_{{ $action->id }}');"{{ $checked }}>
                                <label class="custom-control-label" for="checkbox_{{ $action->id }}">Показывать в слайдере</label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.content.actions.actions.edit', ['action' => $action->id]) }}" target="_blank">
                                <i class="far fa-edit text-warning mr-1"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Баннер о нас</h3>
        </div>

        <div class="card-body">
            <form class="mb-5" action="{{ route('admin.pages.home.banner_home_item_update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="elm1">Описание</label>
                    <input type="hidden" name="id" value="{{ $about_us_description->id }}">
                    <textarea name="full_description" class="form-control" rows="5"
                              id="elm1">{!! $about_us_description->full_description !!}</textarea>
                </div>
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>

            <button id="addItemAbout" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bannerTop"><i class="fas fa-plus"></i> Добавить изображение</button>
            <table class="table table-bordered dt-responsive nowrap"
                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Заголовок</th>
                    <th>Изображение</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($about_us_slider as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td><img src="{{ URL::asset('storage/' . $item->img)}}" style="max-height: 80px; width: auto"></td>
                        <td>
                            <a href="{{ route('admin.pages.home.banner_home_top_edit', ['id' => $item->id]) }}"><i
                                    class="far fa-edit text-warning mr-1"></i></a>
                            <a href="{{ route('admin.pages.home.banner_home_top_destroy') }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $item->id }}').submit(); return false;">
                                <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $item->id }}" action="{{ route('admin.pages.home.banner_home_top_destroy') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


@stop

@section('footerScript')
    {{--    upload files --}}
    <script src="{{ URL::asset('assets/pages/jquery.form-upload.init.js') }}"></script>
    <script src="{{ URL::asset('plugins/dropify/js/dropify.min.js')}}"></script>
    {{-- text editor --}}
    <script src="{{ URL::asset('plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/jquery.form-editor.init.js')}}"></script>

    <!-- Modal -->
    <div class="modal fade" id="bannerTop" tabindex="-1" aria-labelledby="bannerTopLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bannerTopLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="{{ route('admin.pages.home.banner_home_item_store') }}" id="adItemTop" method="post">
                        @csrf
                        <input type="file" name="img" class="dropify">
                        <input type="hidden" name="code_banner" value="home_top">
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnAddTopBanner" type="button" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#btnAddTopBanner').click(function (){
            $('#adItemTop').submit();
        });
    </script>

    <script>
        function update_status(id) {
            var status;
            $this = $("#" + id);
            if ($($this).is(":checked")) {
                status = '1';
            } else {
                status = '0';
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ url('/admin/content/actions/actions') }}/" + id,
                data: {
                    show_home: status,
                    id: id.split('_')[1],
                    method: 'ajax',
                    _method: 'PUT'
                },
                success: function(resp) {
                    // console.log(resp)
                    // success function is called when data came back
                    // for example: get your content and display it on your site
                }
            });
        }
    </script>

    <script>
        $('#addItemAbout').on('click', function (){
            var form = $('form#adItemTop');
            form.find('input[name="code_banner"]').val('home_about_us');
            form.append('<div id="old_request" class="form-group"><input name="title" class="form-control" placeholder="Заголовок" style="margin-top: 20px"></div>');
        });

        $('#btnBannerTop').on('click', function (){
            var form = $('form#adItemTop');
            var old_request = form.find('#old_request');
            if (old_request.length !== 0){
                old_request.empty();
            }
            form.find('input[name="code_banner"]').val('home_top');
        });

    </script>
@stop
