@extends('admin.layouts.app')

@section('title', 'Врачи')
@section('pageName', 'Редактировать врача')
@section('breadcrumbs')
    <li class="breadcrumb-item active">Редактировать врача</li>
@endsection

@section('headerStyle')
    {{--    upload files --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/dropify/css/dropify.min.css')}}">
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data"
                  action="{{ route('admin.doctors.doctors.update', ['doctor' => $doctor->id]) }}" method="post">
                @method('PUT')
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
                            <input class="form-control" type="text" name="name" value="{{ $doctor->name }}"
                                   id="text-input-name">
                        </div>

                        <div class="checkbox my-3">
                            <div class="custom-control custom-checkbox">
                                <?php
                                if ($doctor->level == '1'){
                                    $checked = ' checked';
                                }else{ $checked = ''; }
                                ?>
                                <input type="checkbox" name="level" class="custom-control-input"{{ $checked }} id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="custom-control-label" for="customCheck3">Врач высшей категории</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <div class="card">
                            <div class="card-body">
                                <input type="file" name="img" id="input-file-now-custom-1" class="dropify"
                                       @if($doctor->img) data-default-file="{{ URL::asset('storage/' . $doctor->img)}}" @endif />
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="elm1">Образование</label>
                    <textarea name="education" class="form-control" rows="5"
                              id="elm1">{{ $doctor->education }}</textarea>
                </div>
                <div class="form-group">
                    <label for="elm2">Дополнительное образование</label>
                    <textarea name="add_education" class="form-control" rows="5"
                              id="elm2">{{ $doctor->add_education }}</textarea>
                </div>
                <div class="form-group">
                    <label for="elm3">Профессиональные награды</label>
                    <textarea name="professional_awards" class="form-control" rows="5"
                              id="elm3">{{ $doctor->professional_awards }}</textarea>
                </div>
                <div class="form-group">
                    <label for="elm4">Медицинские ассоциации</label>
                    <textarea name="medical_associations" class="form-control" rows="5"
                              id="elm4">{{ $doctor->medical_associations }}</textarea>
                </div>

                <div>
                    <h3>Практические интересы</h3>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_{{ $doctor->interests[0]->id ?? 0 }}" type="text"
                                   value="{{ $doctor->interests[0]->description ?? '' }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_{{ $doctor->interests[0]->id ?? 0 }}"
                                       class="custom-file-input" id="customFile1">
                                <label class="custom-file-label" for="customFile1">Выбрать иконку</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-1">
                            @isset($doctor->interests[0])
                            <img src="{{ asset('storage/' . $doctor->interests[0]->ico) ?? '' }}" alt="">
                            @endisset
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_{{ $doctor->interests[1]->id ?? 0 }}" type="text"
                                   value="{{ $doctor->interests[1]->description ?? '' }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_{{ $doctor->interests[1]->id ?? 0 }}"
                                       class="custom-file-input" id="customFile2">
                                <label class="custom-file-label" for="customFile2">Выбрать иконку</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-1">
                            @isset($doctor->interests[1])
                            <img src="{{ asset('storage/' . $doctor->interests[1]->ico) ?? '' }}" alt="">
                            @endisset
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_{{ $doctor->interests[2]->id ?? 0 }}" type="text"
                                   value="{{ $doctor->interests[2]->description ?? '' }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_{{ $doctor->interests[2]->id ?? 0 }}"
                                       class="custom-file-input" id="customFile3">
                                <label class="custom-file-label" for="customFile3">Выбрать иконку</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-1">
                            @isset($doctor->interests[2])
                            <img src="{{ asset('storage/' . $doctor->interests[2]->ico) ?? '' }}" alt="">
                            @endisset
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-9">
                            <label>Описание</label>
                            <input class="form-control" name="interest_{{ $doctor->interests[3]->id ?? 0 }}" type="text"
                                   value="{{ $doctor->interests[3]->description ?? '' }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <div class="custom-file">
                                <input type="file" name="ico_{{ $doctor->interests[3]->id ?? 0 }}"
                                       class="custom-file-input" id="customFile4">
                                <label class="custom-file-label" for="customFile4">Выбрать иконку</label>
                            </div>
                        </div>
                        <div class="form-group col-sm-1">
                            @isset($doctor->interests[3])
                            <img src="{{ asset('storage/' . $doctor->interests[3]->ico) ?? '' }}" alt="">
                            @endisset
                        </div>
                    </div>

                </div>

                <div>
                    <h3>Специализации</h3>
                    <?php
                    $doc_prof = array_keys($doctor->professions->keyBy('id')->toArray());
                    ?>
                    @foreach($professions as $profession)
                        <?php
                        if (in_array($profession->id, $doc_prof)) {
                            $checked = ' checked';
                        } else {
                            $checked = '';
                        }
                        ?>
                        <div class="custom-control custom-checkbox" style="display: inline-block">
                            <input type="checkbox" class="custom-control-input" id="prof_box_{{ $profession->id }}"
                                   name="profession_{{ $profession->id }}"{{ $checked }}>
                            <label class="custom-control-label"
                                   for="prof_box_{{ $profession->id }}">{{ $profession->name }}</label>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div>
                    <h3>Услуги</h3>
                    <?php
                    $doc_serv = array_keys($doctor->services->keyBy('id')->toArray());
                    ?>
                    @foreach($services as $service)
                        <?php
                        if (in_array($service->id, $doc_serv)) {
                            $checked = ' checked';
                        } else {
                            $checked = '';
                        }
                        ?>
                        <div class="custom-control custom-checkbox" style="display: inline-block">
                            <input type="checkbox" class="custom-control-input" id="serv_box_{{ $service->id }}"
                                   name="service_{{ $service->id }}"{{ $checked }}>
                            <label class="custom-control-label"
                                   for="serv_box_{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div>
                    <h3>Карьера</h3>
                    <button id="add-field-jobs" type="submit" class="btn btn-gradient-primary my-3">Добавить поле
                    </button>
                    <div id="jobs" class="row">
                        @foreach($doctor->jobs as $job)

                            <div class="wrap" data-id="{{ $job->id }}">
                                <div class="form-group col-sm-2">
                                    <label>Начало</label>
                                    <input class="form-control" type="date" name="job_start_{{ $job->id }}"
                                           @if($job->start) value="{{ $job->start->format('Y-m-d') }}" @endif>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Окончание</label>
                                    <input class="form-control" type="date" name="job_end_{{ $job->id }}"
                                           @if($job->end) value="{{ $job->end->format('Y-m-d') }}" @endif>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label>Должность</label>
                                    <input type="text" class="form-control" name="job_position_{{ $job->id }}"
                                           value="{{ $job->position }}">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Место работы</label>
                                    <input type="text" class="form-control" name="job_place_{{ $job->id }}"
                                           value="{{ $job->place }}">
                                </div>
                                <div class="form-group col-sm-1 mt-1 mb-0">
                                    <button type="button" name="del-field" class="btn btn-gradient-danger">Удалить
                                    </button>
                                </div>
                            </div>

                        @endforeach
                    </div>
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

            // last_wrap.querySelector('button').setAttribute('name', 'del-field');
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
