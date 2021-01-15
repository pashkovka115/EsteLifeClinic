@extends('layouts.index')

@section('header_style')

@endsection

@section('content')
    <section class="contacts-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="padding-top: 40px">
                    <h1 class="title">Контакты</h1>
                </div>
                <div class="col-lg-5">
                    <div class="contacts-box">
                        <div class="item add-item">
                            <i class="demo-icon icon-pin"></i>
                            <p>{!! option('address')->val !!}</p>
                        </div>
                        <div class="item time-item">
                            <h4>Режим работы:</h4>
                            <table>
                                <tr>
                                    <?php $rab_days = option('rab_days'); ?>
                                    <td>{!! $rab_days->val !!}</td>
                                    <td>{!! $rab_days->val2 !!}</td>
                                </tr>
                                <tr>
                                    <?php $mini_day = option('mini_day'); ?>
                                    <td>{!! $mini_day->val !!}</td>
                                    <td>{!! $mini_day->val2 !!}</td>
                                </tr>
                                <tr>
                                    <td>Воскресенье</td>
                                    <td>выходной</td>
                                </tr>
                            </table>
                        </div>
                        <div class="item phones-item">
                            <h4>Телефон:</h4>
                            <ul>
                                <li><a href="tel:+{{ preg_replace('/\+|\s|\-|\(|\)/', '', option('phone1')->val) }}">{{ option('phone1')->val }}</a></li>
                                <li><a href="tel:+{{ preg_replace('/\+|\s|\-|\(|\)/', '', option('phone2')->val) }}">{{ option('phone2')->val }}</a></li>
                            </ul>
                        </div>
                        <div class="item other-item">
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
                <div class="col-lg-7">
                    <div class="map-block">
                        <div class="tabs">
                            <span class="tab">Карта</span>
                            <span class="tab">Схема проезда</span>
                        </div>
                        <div class="tab_content">
                            <div class="tab_item"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5c075c331567f015f38dfbef2fab94ffd902082604e8a9b99c5538513e6ff57f&amp;width=100%25&amp;height=445&amp;lang=ru_RU&amp;scroll=true"></script></div>
                            <div class="tab_item"><img src="{{ asset('img/karta.jpg') }}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
