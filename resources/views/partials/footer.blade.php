<section class="contacts-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="contacts-box">
                    <h2 style="font-size: 40px">ESTELIFE CLINIC</h2>
                    <div class="item">
                        <h4>Адрес:</h4>
                        <p>{{ strip_tags(option('address')->val) }}</p>
                    </div>
                    <div class="item">
                        <h4>Режим работы:</h4>
                        <table>
                            <tr>
                                <?php $rab_days = option('rab_days'); ?>
                                <td>{{ $rab_days->val }}</td>
                                <td>{{ $rab_days->val2 }}</td>
                            </tr>
                            <tr>
                                <?php $mini_day = option('mini_day'); ?>
                                <td>{{ $mini_day->val }}</td>
                                <td>{{ $mini_day->val2 }}</td>
                            </tr>
                            <tr>
                                <td>Воскресенье</td>
                                <td>выходной</td>
                            </tr>
                        </table>
                    </div>
                    <div class="item">
                        <h4>Телефон:</h4>
                        <ul>
                            <li><a href="tel:+{{ preg_replace('/\+|\s|\-|\(|\)/', '', option('phone1')->val) }}">{{ option('phone1')->val }}</a></li>
                            <li><a href="tel:+{{ preg_replace('/\+|\s|\-|\(|\)/', '', option('phone2')->val) }}">{{ option('phone2')->val }}</a></li>
                        </ul>
                    </div>
                    <div class="item">
                        <h4>Email и соц.сети:</h4>
                        <p><a href="mailto:{!! option('email')->val !!}">{{ option('email')->val }}</a></p>
                        <div class="soc-box-2">
                            <?php $soc_networks = options(['whatsapp', 'telegram', 'facebook', 'vk', 'instagram', 'youtube', 'prodoctorov']); ?>
                            <ul>
                                @foreach($soc_networks as $network)
                                    @if($network->key == 'whatsapp' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-whatsapp"></i></a></li>
                                    @elseif($network->key == 'telegram' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-telegram"></i></a></li>
                                    @elseif($network->key == 'facebook' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-fb2"></i></a></li>
                                    @elseif($network->key == 'vk' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-vk2"></i></a></li>
                                    @elseif($network->key == 'instagram' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-insta"></i></a></li>
                                    @elseif($network->key == 'youtube' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-youtube"></i></a></li>
                                    @elseif($network->key == 'prodoctorov' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-prodoc"></i></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map" id="map"></div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wrapper">
                <div class="column">
                    <div class="logo-box"><a href="/"><img src="{{ asset('img/logo.svg') }}" alt=""></a></div>
                    <button id="specialButton2" class="version-visim">Версия для слабовидящих</button>
                </div>
                <div class="column column-menu">
                    <h4>Документы</h4>
                    <div>
                        {{-- todo: Лицензия на медицинскую деятельность --}}
                        <ul>
                            @foreach(\Menu::getByName('Документы') as $item)
                                <li><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="column column-menu">
                    <h4>О компании</h4>
                    <div>
                        <ul>
                            @foreach(\Menu::getByName('О компании') as $item)
                            <li><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="column column-menu">
                    <h4>Услуги</h4>
                    <div>
                        <ul>
                            @foreach(\Menu::getByName('Услуги') as $item)
                                <li><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="column column-contacts">
                    <h4>Свяжитесь с нами!</h4>
                    <ul>
                        <li><a href="tel:+{{ preg_replace('/\+|\s|\-|\(|\)/', '', option('phone1')->val) }}">{{ option('phone1')->val }}</a></li>
                        <li><a href="tel:+{{ preg_replace('/\+|\s|\-|\(|\)/', '', option('phone2')->val) }}">{{ option('phone2')->val }}</a></li>
                    </ul>
                    <p class="email"><a href="mailto:{!! option('email')->val !!}">{{ option('email')->val }}</a></p>
                    <p class="msngr"><a href=""><i class="demo-icon icon-whatsapp"></i></a> <a href=""><i class="demo-icon icon-telegram"></i></a></p>
                    <h4>мы в соц.сетях</h4>
                    <div class="soc-box-2">
                        <ul>
                            <li><a href=""><i class="demo-icon icon-fb2"></i></a></li>
                            <li><a href=""><i class="demo-icon icon-vk2"></i></a></li>
                            <li><a href=""><i class="demo-icon icon-insta"></i></a></li>
                            <li><a href=""><i class="demo-icon icon-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info-panel">Имеются противопоказания, требуется консультация специалиста. Деятельность осуществляется на основании лицензии № ЛО-23-01-014099.</div>
</footer>

</div>

<section class="mobile-menu-block">
    <button class="close-menu"><i class="demo-icon icon-close"></i></button>
    <ul class="mobile-menu">
        <li class="level-1"><a href="">Косметология</a></li>
        <li class="level-1"><a href="">Медицина</a></li>
        <li class="level-1"><a href="">Цены</a></li>
        <li class="level-1"><a href="" class="red-link">Акции</a></li>
        <li class="level-1"><a href="">Врачи</a><button class="open-menu-level open-menu-level-2"><i class="demo-icon icon-arrow-right"></i></button>
            <ul class="level-2-list">
                <li class="level-2"><a href="">Эндокринолог</a></li>
                <li class="level-2"><a href="">Гинеколог</a><button class="open-menu-level open-menu-level-3"><i class="demo-icon icon-arrow-right"></i></button>
                    <ul class="level-3-list">
                        <li class="level-3"><a href="">Яковенко Ольга Алексеевна</a></li>
                        <li class="level-3"><a href="">Абрамашвили Юлия Георгиевна</a></li>
                    </ul>
                </li>
                <li class="level-2"><a href="">Невролог</a></li>
                <li class="level-2"><a href="">Дерматолог</a></li>
                <li class="level-2"><a href="">Косметолог</a></li>
                <li class="level-2"><a href="">Трихолог</a></li>
                <li class="level-2"><a href="">УЗ-диагностики</a></li>
                <li class="level-2"><a href="">Дерматовенеролог</a></li>
                <li class="level-2"><a href="">Массажист</a></li>
            </ul>
        </li>
        <li class="level-1"><a href="">До/После</a></li>
        <li class="level-1"><a href="">О нас</a></li>
        <li class="level-1"><a href="">Контакты</a></li>
        <li class="level-1"><a href="">Наш магазин</a></li>
    </ul>
    <div class="contacts-mobile-menu">
        <div class="add-item">г. Краснодар, ул.Коммунаров 225/1</div>
        <div class="phone-item"><a href="tel:+79183800900">+7 (918) 3-800-900</a></div>
        <div class="time-item">
            <p><b>Пн-Пт: 8:00</b> — 20:00</p>
            <p><b>Сб: 9:00</b> — 18:00</p>
            <p><b>Вс:</b> выходной</p>
        </div>
    </div>
    <div class="btn-wrap">
        <a href="#order" class="btn btn-white popup-with-form">Записаться на прием</a>
        <a href="#callback" class="btn btn-border-white popup-with-form">Заказать звонок</a>
    </div>
    <ul class="soc-box-mobile-menu">
        <li><a href="" class="icn icn-whatsapp">Whatsapp</a></li>
        <li><a href="" class="icn icn-tg">Telegram</a></li>
        <li><a href="" class="icn icn-fb">Facebook</a></li>
        <li><a href="" class="icn icn-vk">VK</a></li>
        <li><a href="" class="icn icn-insta">Instagram</a></li>
    </ul>

</section>


<div class="hidden">
    <form action="{{ route('front.call.store') }}" class="form popup-form" id="callback" method="post">
        @csrf
        <h3>Заполните форму обратного звонка</h3>
        <input type="text"  name="name" placeholder="Ваше имя"  required="required">
        <input type="text"  name="phone" class="tel-input" placeholder="Номер телефона" required="required">
        <button class="btn btn-indigo">Отправить</button>
        <p class="policy">Нажимая на кнопку, вы соглашаетесь с <a href="">«политикой конфиденциальности»</a></p>
        <p>Вы также можете позвонить по номеру<br /> {{ option('phone1')->val }}, чтобы узнать любую информацию</p>
    </form>

    <form action="{{ route('front.reviews.store') }}" class="form popup-form" id="review-form" method="post">
        @csrf
        <h3>Оставить отзыв</h3>
        <input type="text"  name="name" placeholder="Ваше имя"  required="required">
        <input type="text"  name="phone" class="tel-input" placeholder="Номер телефона" required="required">
        <select name="cat_service_id">
            <option value="">Выберите направление</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <textarea name="content" placeholder="Ваш отзыв"></textarea>
        <button class="btn btn-indigo">Написать</button>
        <p class="policy">Нажимая на кнопку, вы соглашаетесь с <a href="">«политикой конфиденциальности»</a></p>
        <p>Вы также можете позвонить по номеру<br /> {{ option('phone1')->val }}, чтобы узнать любую информацию</p>
    </form>

    <form action="{{ route('front.appointment.store') }}" class="form popup-form" id="order" method="post">
        @csrf
        <h3>Запись на прием</h3>
        <p class="subtitle">Администратор нашего центра перезвонит вам для подтверждения записи</p>
        <div class="steps-digits">
            <span class="step-digit step-digit-1 active">01</span>
            <span class="step-digit step-digit-2">02</span>
            <span class="step-digit step-digit-3">03</span>
        </div>
        <div class="step-item step-1 active">
            <input type="text" name="name"  placeholder="Ваше имя"  required="required">
            <input type="text" name="phone"  class="tel-input" placeholder="Номер телефона" required="required">
            <div class="btn btn-indigo" id="step-2">Далее</div>
        </div>
        <div class="step-item step-2">
            <select name="cat_servise_id">
                <option value="">Выберите направление</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select name="service_id">
                <option value="">Выберите услугу</option>
                @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
            <select name="doctor_id">
                <option value="">Выберите врача</option>
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
            <div class="btn btn-indigo" id="step-3">Последний вопрос</div>
            <div class="btn btn-default mt-3" id="step-2-back">Назад</div>
        </div>
        <div class="step-item step-3">
            <input type="date" name="date"  placeholder="Желаемая дата посещения" required>
            <select name="time">
                <option value="Не важно">Желаемое время посещения</option>
                @for($i = 8; $i <= 19; $i++)
                <option value="{{ $i }}:00">{{ $i }} : 00</option>
                <option value="{{ $i }}:30">{{ $i }} : 30</option>
                @endfor
            </select>
            <button class="btn btn-indigo" id="step-3">Отправить</button>
            <div class="btn btn-default mt-3" id="step-3-back">Назад</div>
        </div>
        <p class="policy">Нажимая на кнопку, вы соглашаетесь с <a href="">«политикой конфиденциальности»</a></p>
        <p>Вы также можете позвонить по номеру<br /> {{ option('phone1')->val }}, чтобы узнать любую информацию</p>
    </form>

    <form action="{{ route('front.online.store') }}" class="form popup-form" id="online" method="post">
        @csrf
        <h3>Запись на онлайн консультацию</h3>
        <p class="subtitle">Администратор нашего центра перезвонит вам для подтверждения записи</p>
        <div class="steps-digits">
            <span class="step-digit step-digit-1 active">01</span>
            <span class="step-digit step-digit-22">02</span>
            <span class="step-digit step-digit-33">03</span>
        </div>
        <div class="step-item step-11 active">
            <input type="text" name="name"  placeholder="Ваше имя"  required="required">
            <input type="text" name="phone"  class="tel-input" placeholder="Номер телефона" required="required">
            <div class="btn btn-indigo" id="step-22">Далее</div>
        </div>
        <div class="step-item step-22">
            <select name="cat_servise_id" id="cat_servise_id">
                <option value="0">Выберите направление</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select name="service_id" id="service_id">
                <option value="0">Выберите услугу</option>
                @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
            <select name="doctor_id" id="doctor_id">
                <option value="0">Выберите врача</option>
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
            <div class="btn btn-indigo" id="step-33">Последний вопрос</div>
        </div>
        <div class="step-item step-33">
            <input type="date" name="date"  placeholder="Желаемая дата посещения" required>
            <select name="time">
                <option value="Не важно">Желаемое время</option>
                @for($i = 8; $i <= 19; $i++)
                <option value="{{ $i }}:00">{{ $i }} : 00</option>
                <option value="{{ $i }}:30">{{ $i }} : 30</option>
                @endfor
            </select>
            <button class="btn btn-indigo" id="step-44">Отправить</button>
        </div>
        <p class="policy">Нажимая на кнопку, вы соглашаетесь с <a href="">«политикой конфиденциальности»</a></p>
        <p>Вы также можете позвонить по номеру<br /> {{ option('phone1')->val }}, чтобы узнать любую информацию</p>
    </form>


    <div class="popup-contacts-form" id="contacts-form">
        <div class="title">
            <h3>EsteLife Clinic</h3>
            <div class="tabs">
                <span class="tab">Карта</span>
                <span class="tab">Схема проезда</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="tab_content">
{{--                    <div class="tab_item"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5c075c331567f015f38dfbef2fab94ffd902082604e8a9b99c5538513e6ff57f&amp;width=100%25&amp;height=255&amp;lang=ru_RU&amp;scroll=true"></script></div>--}}
                    <div class="tab_item"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A622a2ee91443bf0ab024d19a4ebf9c68e83113569d3cb4a618b22c6c685f44cb&amp;width=100%25&amp;height=255&amp;lang=ru_RU&amp;scroll=true"></script></div>
                    <div class="tab_item"><img src="{{ asset('img/karta.jpg') }}" alt=""></div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contacts-box">
                    <div class="item">
                        <p>{{ strip_tags(option('address')->val) }}</p>
                    </div>
                    <div class="item">
                        <table>
                            <tr>
                                <td>{{ option('rab_days')->val }}</td>
                                <td>{{ option('rab_days')->val2 }}</td>
                            </tr>
                            <tr>
                                <td>{{ option('mini_day')->val }}</td>
                                <td>{{ option('mini_day')->val2 }}</td>
                            </tr>
                            <tr>
                                <td>Воскресенье</td>
                                <td>выходной</td>
                            </tr>
                        </table>
                    </div>
                    <div class="item">
                        <p class="phone">{{ option('phone1')->val }}</p>
                        <p class="phone">{{ option('phone2')->val }}</p>
                    </div>
                    <div class="item">
                        <p><b>Маршрутные такси:</b> {{ option('route_taxis')->val }}</p>
                        <p><b>Трамвай:</b> {{ option('tram')->val }}</p>
                    </div>
                    <a href="#callback" class="btn btn-indigo popup-with-form">Заказать обратный звонок</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="done-w">
    <div class="done-window">
        <img src="{{ asset('img/check.svg') }}" alt="">
        <h3>Спасибо!</h3>
        <p>Ваша заявка принята. Наш администратор свяжется с вами в течение одного рабочего дня</p>
        <a href="" class="btn btn-indigo">Закрыть</a>
    </div>
</div>
<script src="https://api-maps.yandex.ru/2.0/?load=package.standard,package.geoObjects&lang=ru-RU" type="text/javascript"></script>
<script src="{{ asset('js/scripts.min.js') }}"></script>
<script src="https://lidrekon.ru/slep/js/uhpv-full.min.js"></script>
<script>
$('#specialButton2').on('click', function (){
    $('#specialButton').click();
    return false;
});
</script>
<script>
    function setService(el){
        let id = $(el).data('service-id');
        let form_order = $('form#order');
        form_order.find('select[name="service_id"]').find('option[value="'+ id +'"]').attr('selected','selected');
        form_order.find('select[name="service_id"]').next().find('ul li:first-child').removeClass('selected')
        let current_li = form_order.find('select[name="service_id"]').next().find('li[data-value="'+ id +'"]');
        current_li.addClass('selected');
        let span_current = form_order.find('select[name="service_id"]').next().find('span.current');
        span_current.html(current_li.text());

        console.log('service = ', id)
    }
    function setDoctor(el){
        let id = $(el).data('doctor-id');
        let form_order = $('form#order');
        form_order.find('select[name="doctor_id"]').find('option[value="'+ id +'"]').attr('selected','selected');
        form_order.find('select[name="doctor_id"]').next().find('ul li:first-child').removeClass('selected')
        let current_li = form_order.find('select[name="doctor_id"]').next().find('li[data-value="'+ id +'"]');
        current_li.addClass('selected');
        let span_current = form_order.find('select[name="doctor_id"]').next().find('span.current');
        span_current.html(current_li.text());

        console.log('doctor = ', id)
    }
</script>
{{ option('script_footer')->val }}

