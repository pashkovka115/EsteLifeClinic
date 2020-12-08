@extends('admin.layouts.app')

@section('title', 'Наши врачи')

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.doctors.doctors.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="text-input-name">Имя</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                   id="text-input-name">
                        </div>
                        <div class="form-group">
                            <label for="text-input-lavel">Уровень</label>
                            <input class="form-control" type="text" name="level" value="{{ old('level') }}"
                                   id="text-input-lavel">
                        </div>
                    </div>

                    <div class="col-sm-4">

                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="img" id="input-file-now-custom-1" class="dropify" />
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="elm1">Образование</label>
                    <textarea name="education" class="form-control" rows="5" id="elm1">{{ old('education') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="elm2">Дополнительное образование</label>
                    <textarea name="add_education" class="form-control" rows="5" id="elm2">{{ old('add_education') }}</textarea>
                </div>

                <div>
                    <h3>Практические интересы</h3>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_1" type="text" value="{{ old('interest_1') }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_1" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Выбрать иконку</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_2" type="text"
                                   value="{{ old('interest_2') }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_2"
                                       class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Выбрать иконку</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_3" type="text"
                                   value="{{ old('interest_3') }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_3"
                                       class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Выбрать иконку</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_4" type="text"
                                   value="{{ old('interest_4') }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_4"
                                       class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Выбрать иконку</label>
                            </div>
                        </div>
                    </div>

                </div>

                <div>

                    <h3>Специализации</h3>
                    @foreach($professions as $profession)
                        <div class="custom-control custom-checkbox" style="display: inline-block">
                            <input type="checkbox" class="custom-control-input" id="prof_box_{{ $profession->id }}"
                                   name="profession_{{ $profession->id }}">
                            <label class="custom-control-label"
                                   for="prof_box_{{ $profession->id }}">{{ $profession->name }}</label>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div>

                    <h3>Услуги</h3>
                    @foreach($services as $service)
                        <div class="custom-control custom-checkbox" style="display: inline-block">
                            <input type="checkbox" class="custom-control-input" id="serv_box_{{ $service->id }}"
                                   name="service_{{ $service->id }}">
                            <label class="custom-control-label"
                                   for="serv_box_{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div>
                    <h3>Карьера</h3>
                    <button id="add-field-jobs" type="submit" class="btn btn-gradient-primary my-3">Добавить поле</button>
                    <div id="jobs" class="row"></div>
                </div>
                <button type="submit" class="btn btn-gradient-success my-3">Сохранить</button>
            </form>
        </div>
    </div>


    <template id="template">
        <div class="wrap">
            <div class="form-group col-sm-2">
                <label>Начало</label>
                <input class="form-control" type="date" value="">
            </div>
            <div class="form-group col-sm-2">
                <label>Окончание</label>
                <input class="form-control" type="date" value="">
            </div>
            <div class="form-group col-sm-3">
                <label>Должность</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="form-group col-sm-4">
                <label>Место работы</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="form-group col-sm-1 mt-1 mb-0">
                <button type="button" name="del-field"
                        onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);"
                        class="btn btn-gradient-danger">Удалить
                </button>
            </div>
        </div>
    </template>

    <script>
        let button = document.querySelector('#add-field-jobs');
        button.onclick = function (e) {
            e.preventDefault();

            let wraps = document.querySelectorAll('#jobs .wrap');
            let last_id = 0;
            if (wraps.length > 0) {
                last_id = wraps[wraps.length - 1].dataset.id;
            }

            jobs.append(template.content.cloneNode(true));
            wraps = document.querySelectorAll('#jobs .wrap');
            let last_wrap = wraps[wraps.length - 1];
            last_wrap.dataset.id = parseInt(last_id) + 1;
            let inputs = last_wrap.querySelectorAll('input');

            inputs[0].setAttribute('name', 'job_start_' + (parseInt(last_id) + 1));
            inputs[1].setAttribute('name', 'job_end_' + (parseInt(last_id) + 1));
            inputs[2].setAttribute('name', 'job_position_' + (parseInt(last_id) + 1));
            inputs[3].setAttribute('name', 'job_place_' + (parseInt(last_id) + 1));

        };

        var els = document.getElementsByName("del-field");
        els.forEach(function (item) {
            item.addEventListener("click", function () {
                item.parentNode.parentNode.parentNode.removeChild(item.parentNode.parentNode);
            });
        });
    </script>

@stop

@section('footerScript')
    {{--    upload files --}}
    <script src="{{ URL::asset('assets/pages/jquery.form-upload.init.js') }}"></script>
    <script src="{{ URL::asset('plugins/dropify/js/dropify.min.js')}}"></script>
    {{-- text editor --}}
    <script src="{{ URL::asset('plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ URL::asset('assets/pages/jquery.form-editor.init.js')}}"></script>
@stop
