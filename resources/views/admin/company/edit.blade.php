@extends('admin.layouts.app')

@section('title', 'О компании')
@section('pageName', 'О компании')
@section('breadcrumbs')
    <li class="breadcrumb-item active">О компании</li>
@endsection
@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
    <style>
        div.dropify-wrapper{
            height: 90px;
        }
    </style>
@stop

@section('content')
    <form enctype="multipart/form-data" action="{{ route('admin.pages.company.update', ['company' => 'company']) }}" method="post">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header">
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="form-group col-sm-12 mb-5">
                        <label for="text-input-name">Заголовок</label>
                        <input class="form-control" type="text" name="name" value="{{ $company->name }}"
                               id="text-input-name">
                    </div>

                    {{--<div class="form-group col-sm-12">
                        <label>Верхний слайдер</label>
                        <select name="top_slider" class="form-control">
                            <option value="0">Баннер отключен</option>
                            @foreach($banners as $banner)
                                <?php
                                $selected = '';
                                if ($company->top_sliders){
                                    if ($banner->id == $company->top_sliders->id){
                                        $selected = ' selected';
                                    }
                                }
                                ?>
                                <option value="{{ $banner->id }}" {{ $selected }}>{{ $banner->name }}</option>
                            @endforeach
                        </select>
                    </div>--}}

                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="text-input-name">Кто мы такие?</label>
                        <input class="form-control" type="text" name="h3" value="{{ $company->h3 }}"
                               id="text-input-name">
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="text-input-name">Наш опыт</label>
                        <input class="form-control" type="text" name="practice" value="{{ $company->practice }}"
                               id="text-input-name">
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="text-input-name">Проведено процедур</label>
                        <input class="form-control" type="text" name="cnt" value="{{ $company->cnt }}"
                               id="text-input-name">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="elm1">Описание</label>
                        <textarea name="description" class="form-control" rows="5"
                                  id="elm1">{{ $company->description }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <h3 class="col-sm-12">Наши преимущества</h3>
                    <div class="form-group col-sm-8">
                        <textarea name="service1" class="form-control" rows="5">{{ $company->service1 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico1" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico1) data-default-file="{{ URL::asset('storage/' . $company->ico1)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service2" class="form-control" rows="5">{{ $company->service2 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico2" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico2) data-default-file="{{ URL::asset('storage/' . $company->ico2)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service3" class="form-control" rows="5">{{ $company->service3 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico3" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico3) data-default-file="{{ URL::asset('storage/' . $company->ico3)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-8">
                        <textarea name="service4" class="form-control" rows="5">{{ $company->service4 }}</textarea>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="ico4" id="input-file-now-custom-1" class="dropify"
                                       @if($company->ico4) data-default-file="{{ URL::asset('storage/' . $company->ico4)}}" @endif />
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="row">
                    <div class="form-group col-sm-12">
                        <label>Средний слайдер</label>
                        <?php //dd($company->middle_sliders);  ?>
                        <select name="middle_slider" class="form-control">
                            <option value="0">Баннер отключен</option>
                            @foreach($banners as $banner)
                            <?php
                            $selected = '';
                            if ($company->middle_sliders){
                                if ($banner->id == $company->middle_sliders->id){
                                    $selected = ' selected';
                                }
                            }
                            ?>
                                <option value="{{ $banner->id }}" {{ $selected }}>{{ $banner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>--}}

               {{-- <div class="row">
                    <div class="form-group col-sm-12">
                        <label>Нижний слайдер</label>
                        <select name="bottom_slider" class="form-control">
                            <option value="0">Баннер отключен</option>
                            @foreach($banners as $banner)
                                <?php
                                $selected = '';
                                if ($company->bottom_sliders){
                                    if ($banner->id == $company->bottom_sliders->id){
                                        $selected = ' selected';
                                    }
                                }
                                ?>
                                <option value="{{ $banner->id }}" {{ $selected }}>{{ $banner->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>--}}



                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Верхний баннер</h3>
            <h4 class="mt-0 header-title">Размер: 950x500</h4>
            <button id="BannerTop" class="btn btn-primary" data-toggle="modal" data-target="#bannerTop"><i class="fas fa-plus"></i> Добавить изображение</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered dt-responsive nowrap mb-5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>№</th>
                    <th title="title">Заголовок</th>
                    <th title="img">Изображение</th>
                    <th title="description">Описание</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banner_top as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->title }}</td>
                        <td><img src="/storage/{{ $item->img }}" alt="" style="max-height: 80px; width: auto"></td>
                        <td>{!! $item->description !!}</td>
                        <td>
                            <a href="{{ route('admin.pages.company.banners.edit', ['id' => $item->id]) }}">
                                <i class="far fa-edit text-warning mr-1"></i>
                            </a>
                            <a href="{{ route('admin.pages.company.banners.destroy', ['id' => $item->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $item->id }}').submit(); return false;">
                                <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $item->id }}" action="{{ route('admin.pages.company.banners.destroy', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                @csrf
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
            <h3 class="card-title">Второй баннер</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pages.company.banners.update', ['id' => $banner_two_text->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="elm2">Описание</label>
                    <input type="hidden" name="id" value="">
                    <textarea name="description" class="form-control" rows="5"
                              id="elm2">{!! $banner_two_text->description !!}</textarea>
                </div>
                <input type="hidden" name="code_banner" value="about_company_two_text">

                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
        <div class="card-header">
            <h4 class="mt-0 header-title">Размер: 500x376</h4>
            <button id="BannerTwo" class="btn btn-primary" data-toggle="modal" data-target="#bannerTwo"><i class="fas fa-plus"></i> Добавить изображение</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered dt-responsive nowrap mb-5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>№</th>
                    <th title="img">Изображение</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banner_two as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/storage/{{ $item->img }}" alt="" style="max-height: 80px; width: auto"></td>
                        <td>
                            <a href="{{ route('admin.pages.company.banners.edit', ['id' => $item->id]) }}">
                                <i class="far fa-edit text-warning mr-1"></i>
                            </a>
                            <a href="{{ route('admin.pages.company.banners.destroy', ['id' => $item->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $item->id }}').submit(); return false;">
                                <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $item->id }}" action="{{ route('admin.pages.company.banners.destroy', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                @csrf
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
            <h3 class="card-title">Баннер сертификаты</h3>
            <h4 class="mt-0 header-title">Размер: 285x410</h4>
            <button id="BannerCertificates" class="btn btn-primary" data-toggle="modal" data-target="#bannerCertificates"><i class="fas fa-plus"></i> Добавить изображение</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered dt-responsive nowrap mb-5" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>№</th>
                    <th title="img">Изображение</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                @foreach($banner_certificates as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/storage/{{ $item->img }}" alt="" style="max-height: 80px; width: auto"></td>
                        <td>
                            <a href="{{ route('admin.pages.company.banners.edit', ['id' => $item->id]) }}">
                                <i class="far fa-edit text-warning mr-1"></i>
                            </a>
                            <a href="{{ route('admin.pages.company.banners.destroy', ['id' => $item->id]) }}"
                               onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $item->id }}').submit(); return false;">
                                <i class="fas fa-trash-alt text-danger"></i></a>
                            <form id="form_{{ $item->id }}" action="{{ route('admin.pages.company.banners.destroy', ['id' => $item->id]) }}" method="POST" style="display: none;">
                                @csrf
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
                    <form enctype="multipart/form-data" action="{{ route('admin.pages.company.banners.store') }}" id="adItemTop" method="post">
                        @csrf
                        <input type="hidden" name="code_banner" value="about_company_top">
                        <input type="hidden" name="img" value="x">
                        <input type="hidden" name="extra" value="x">
                        <input type="hidden" name="full_description" value="x">
                        <input type="file" name="img" class="dropify">
                        <div class="form-group" style="margin-top: 20px">
                            <label>Заголовок</label>
                            <input name="title" class="form-control" value="">
                        </div>
                        <div class="form-group" style="margin-top: 20px">
                            <label>Описание</label>
                            <textarea id="elm3" name="description" rows="6" class="form-control"></textarea>
                        </div>
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

    <!-- Modal -->
    <div class="modal fade" id="bannerTwo" tabindex="-1" aria-labelledby="bannerTwoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bannerTwoLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="{{ route('admin.pages.company.banners.store') }}" id="adItemTwo" method="post">
                        @csrf
                        <input type="hidden" name="code_banner" value="about_company_two">
                        <input type="hidden" name="title" value="x">
                        <input type="hidden" name="extra" value="x">
                        <input type="hidden" name="description" value="x">
                        <input type="hidden" name="full_description" value="x">
                        <input type="file" name="img" class="dropify">
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnAddTwoBanner" type="button" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#btnAddTwoBanner').click(function (){
            $('#adItemTwo').submit();
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="bannerCertificates" tabindex="-1" aria-labelledby="bannerCertificatesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bannerCertificatesLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="{{ route('admin.pages.company.banners.store') }}" id="adItemCertificates" method="post">
                        @csrf
                        <input type="hidden" name="code_banner" value="about_company_certificates">
                        <input type="hidden" name="title" value="x">
                        <input type="hidden" name="extra" value="x">
                        <input type="hidden" name="description" value="x">
                        <input type="hidden" name="full_description" value="x">
                        {{--code_banner
                        title
                        img
                        extra
                        description
                        full_description--}}
                        <input type="file" name="img" class="dropify">
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnAddCertificatesBanner" type="button" class="btn btn-primary">Добавить</button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#btnAddCertificatesBanner').click(function (){
            $('#adItemCertificates').submit();
        });
    </script>
@stop
