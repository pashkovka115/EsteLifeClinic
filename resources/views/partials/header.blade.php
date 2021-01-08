<div id="page">
<header>
    <div class="top-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wrapper">
                    <div class="left">
                        <div class="soc-box">
                            <?php $soc_networks = options(['whatsapp', 'telegram', 'facebook', 'vk', 'instagram', 'youtube', 'prodoctorov']); ?>
                            <ul>
                                @foreach($soc_networks as $network)
                                    @if($network->key == 'whatsapp' and $network->val)
                                        <li><a href="{{ $network->val }}" class="icn icn-whatsapp">Whatsapp</a></li>
                                    @elseif($network->key == 'telegram' and $network->val)
                                        <li><a href="{{ $network->val }}" class="icn icn-tg">Telegram</a></li>
                                    @elseif($network->key == 'facebook' and $network->val)
                                        <li><a href="{{ $network->val }}" class="icn icn-fb">Facebook</a></li>
                                    @elseif($network->key == 'vk' and $network->val)
                                        <li><a href="{{ $network->val }}" class="icn icn-vk">VK</a></li>
                                    @elseif($network->key == 'instagram' and $network->val)
                                        <li><a href="{{ $network->val }}" class="icn icn-insta">Instagram</a></li>
                                   {{-- @elseif($network->key == 'youtube' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-youtube"></i></a></li>
                                    @elseif($network->key == 'prodoctorov' and $network->val)
                                        <li><a href="{{ $network->val }}"><i class="demo-icon icon-prodoc"></i></a></li>--}}
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <button class="version-visim"><span><small>А</small>А</span>Версия для слабовидящих</button>
                    </div>
                    <div class="right">
                        <div class="add"><a href="#contacts-form" class="popup-with-form">{!! option('address')->val !!}</a></div>
                        <div class="phone-box">
                            <div class="phone"><a href="tel:+{{ preg_replace('/\+|\s|\-|\(|\)/', '', option('phone1')->val) }}">{{ option('phone1')->val }}</a></div>
                            <div class="time" style="margin-left: 30px;">
                                <?php $rab_days = option('rab_days'); ?>
                                <div><b>{{ $rab_days->val }}:</b><br /> {{ $rab_days->val2 }}</div>
                                <div>
                                    <?php $mini_day = option('mini_day'); ?>
                                    <p><b>{{ $mini_day->val }}:</b> {{ $mini_day->val2 }}</p>
                                    <p><b>Вс:</b> выходной</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="btm-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wrapper">
                    <div class="left">
                        <div class="logo-box">
                            <button class="mobile-btn btn-menu"><img src="{{ asset('img/icon/menu-mobile.svg') }}" alt=""></button>
                            <a href="/"><img src="{{ asset('img/logo.svg') }}" alt=""></a>
                            <div class="wrap-mobile-btn">
                                <button class="btn-open-search"><img src="{{ asset('img/icon/search-mobile.svg') }}" alt=""></button>
                                <a href="#callback" class="btn-mobile-call popup-with-form"><i class="demo-icon icon-phone"></i></a>
                            </div>
                        </div>
                        <div class="search-box">
                            <form action="{{ route('front.search') }}">
                                <input type="text" name="search" placeholder="Введите словосочетание...">
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <a href="#callback" class="btn btn-border-indigo btn-call popup-with-form">Заказать звонок</a>
                        <a href="#order" class="btn btn-indigo btn-order popup-with-form">Записаться на прием</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
