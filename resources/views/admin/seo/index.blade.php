@extends('admin.layouts.app')

@section('title', 'SEO')
@section('pageName', 'SEO')
@section('breadcrumbs')
    <li class="breadcrumb-item active">SEO</li>
@endsection
@section('headerStyle')
{{--    <meta name="csrf-token" content="{{ csrf_token() }}"/>--}}
    <style>
        .toast{
            position: fixed;
            z-index: 999999;
            right:2%;
            top:90%;
            margin:0 !important;
            border: 0;
            border-radius: 0;
        }
        .border-danger{
            border:1px solid #ef4d56;
        }
    </style>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-service-tab" data-toggle="pill" href="#pills-service" role="tab"
                       aria-controls="pills-service" aria-selected="true">Услуги</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-cat_service-tab" data-toggle="pill" href="#pills-cat_service" role="tab"
                       aria-controls="pills-cat_service" aria-selected="false">Категории услуг</a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                       aria-controls="pills-profile" aria-selected="false">Акции</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-cat_news-tab" data-toggle="pill" href="#pills-cat_news" role="tab"
                       aria-controls="pills-cat_news" aria-selected="false">Категории новостей</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-news-tab" data-toggle="pill" href="#pills-news" role="tab"
                       aria-controls="pills-news" aria-selected="false">Новости</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-doctors-tab" data-toggle="pill" href="#pills-doctors" role="tab"
                       aria-controls="pills-doctors" aria-selected="false">Врачи</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-pages-tab" data-toggle="pill" href="#pills-pages" role="tab"
                       aria-controls="pills-pages" aria-selected="false">Страницы</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-company-tab" data-toggle="pill" href="#pills-company" role="tab"
                       aria-controls="pills-company" aria-selected="false">О компании</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
                    {{--      Услуги          --}}
                    @foreach($services as $service)
                        <form id="service_form_{{ $service->id }}">
                            <input type="hidden" name="model" value="service">
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $service->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $service->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $service->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $service->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $service->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('service_form_{{ $service->id }}', );"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-cat_service" role="tabpanel" aria-labelledby="pills-cat_service-tab">
                    {{--      Категории услуг          --}}
                    @foreach($cats_services as $cat_service)
                        <form id="cat_service_form_{{ $cat_service->id }}">
                            <input type="hidden" name="model" value="CatService">
                            <input type="hidden" name="id" value="{{ $cat_service->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $cat_service->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $cat_service->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $cat_service->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $cat_service->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $cat_service->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('cat_service_form_{{ $cat_service->id }}');"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    {{--      Акции          --}}
                    @foreach($actions as $action)
                        <form id="action_form_{{ $action->id }}">
                            <input type="hidden" name="model" value="action">
                            <input type="hidden" name="id" value="{{ $action->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $action->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $action->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $action->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $action->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $action->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('action_form_{{ $action->id }}', );"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-cat_news" role="tabpanel" aria-labelledby="pills-cat_news-tab">
                    {{--      Категории новостей          --}}
                    @foreach($cats_posts as $cat_post)
                        <form id="cat_post_form_{{ $cat_post->id }}">
                            <input type="hidden" name="model" value="CatPost">
                            <input type="hidden" name="id" value="{{ $cat_post->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $cat_post->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $cat_post->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $cat_post->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $cat_post->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $cat_post->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('cat_post_form_{{ $cat_post->id }}');"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                    {{--      Новости          --}}
                    @foreach($posts as $post)
                        <form id="post_form_{{ $post->id }}">
                            <input type="hidden" name="model" value="Post">
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $post->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $post->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $post->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $post->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $post->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('post_form_{{ $post->id }}');"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-doctors" role="tabpanel" aria-labelledby="pills-doctors-tab">
                    {{--      Врачи          --}}
                    @foreach($doctors as $doctor)
                        <form id="doctors_form_{{ $doctor->id }}">
                            <input type="hidden" name="model" value="Doctor">
                            <input type="hidden" name="id" value="{{ $doctor->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $doctor->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $doctor->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $doctor->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $doctor->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $doctor->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('doctors_form_{{ $doctor->id }}');"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-pages" role="tabpanel" aria-labelledby="pills-pages-tab">
                    {{--      Страницы          --}}
                    @foreach($pages as $page)
                        <form id="page_form_{{ $page->id }}">
                            <input type="hidden" name="model" value="Post">
                            <input type="hidden" name="id" value="{{ $page->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $page->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $page->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $page->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $page->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $page->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('page_form_{{ $page->id }}');"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-company" role="tabpanel" aria-labelledby="pills-company-tab">
                    {{--      О компании          --}}
                    @foreach($companys as $company)
                        <form id="company_form_{{ $company->id }}">
                            <input type="hidden" name="model" value="Company">
                            <input type="hidden" name="id" value="{{ $company->id }}">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>{{ $company->name }}</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>title</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $company->title }}">
                                    </div>
                                </div>
                                {{--<div class="col-md-3">
                                    <div class="form-group">
                                        <label>keywords</label>
                                        <input type="text" class="form-control" name="keywords"
                                               value="{{ $company->keywords }}">
                                    </div>
                                </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>META description</label>
                                        <input type="text" class="form-control" name="meta_description"
                                               value="{{ $company->meta_description }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <button id="btn_{{ $company->id }}"
                                                type="button"
                                                onclick="serviceAjaxForm('company_form_{{ $company->id }}');"
                                                class="btn btn-gradient-primary mt-4">Сохранить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="toast d-flex align-items-center " id="saveToast" role="alert"
         data-animation="true" data-delay="4000" aria-live="assertive" aria-atomic="true">
        <div class="toast-body bg-dark text-white border-danger">
            <i class="fas fa-check"></i>    СОХРАНЕНО!</div>
    </div>
@stop

@section('footerScript')
    <script>

        function serviceAjaxForm(formId) {
            // e.preventDefault();

            var form = $('#' + formId);
            var data = {
                model: $(form).find('input[name="model"]').val(),
                id: $(form).find('input[name="id"]').val(),
                title: $(form).find('input[name="title"]').val(),
                meta_description: $(form).find('input[name="meta_description"]').val(),
            }

            // console.log(data)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('admin.seo.update') }}",
                data: data,
                success: function (resp) {
                    $('#saveToast').toast('show')
                    // console.log(resp)
                    // success function is called when data came back
                    // for example: get your content and display it on your site
                }
            });
            return false;
        }

    </script>
@stop
