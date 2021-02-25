 <style>
     .main-menu-inner .menu-body .nav-link{
        padding: 0 !important;
     }
 </style>
 <!-- leftbar-tab-menu -->
 <div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="{{ route('admin.home') }}" class="logo logo-metrica d-block text-center">
            <span>
                <img src="{{ URL::asset('assets/images/logo-sm2.png')}}" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <nav class="nav">
            <a href="#MetricaEcommerce" class="nav-link {{ active('admin.home.*') }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Главная" data-trigger="hover">
                <i data-feather="home" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaEcommerce-->

            <a href="#MetricaApps" class="nav-link {{ active(['admin.services.*']) }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Услуги" data-trigger="hover">
                <i data-feather="shopping-cart" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaApps-->

            <a href="#MetricaPrice" class="nav-link {{ active(['admin.price.*']) }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Цены" data-trigger="hover">
                <i data-feather="dollar-sign" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaApps-->

            <a href="#MetricaPages" class="nav-link {{ active(['admin.doctors.*']) }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Врачи" data-trigger="hover">
                <i data-feather="users" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaPages-->

            <a href="#MetricaPagesContent" class="nav-link {{ active(['admin.content.*']) }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Контент" data-trigger="hover">
                <i data-feather="folder-plus" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaPages-->

            <a href="#pages" class="nav-link {{ active('admin.pages.*') }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Страницы" data-trigger="hover">
                <i data-feather="book-open" class="align-self-center menu-icon icon-dual"></i>
            </a> <!--end MetricaAuthentication-->

            <a href="#MetricaAuthentication" class="nav-link {{ active('admin.options.*') }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Настройки" data-trigger="hover">
                <i data-feather="settings" class="align-self-center menu-icon icon-dual"></i>
            </a> <!--end MetricaAuthentication-->

        </nav><!--end nav-->

    </div><!--end main-icon-menu-->

    <div class="main-menu-inner">

        <div class="menu-body slimscroll">
            <div id="MetricaEcommerce" class="main-icon-menu-pane {{ active('admin.home.home.*') }}">
                <div class="title-box">
                    <h6 class="menu-title">Главная</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ active(['admin.home']) }}" href="{{ route('admin.home') }}"><i class="mdi mdi-home"></i> Главная</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.home.home.appointments.*') }}" href="{{ route('admin.home.home.appointments.index') }}"><i class="mdi mdi-cart-plus"></i> Заявки на прием</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.home.home.appointments.create') }}" href="{{ route('admin.home.home.appointments.create') }}"><i class="mdi mdi-cart-plus"></i> Записать на прием</a></li>
                    <hr>
                    <li class="nav-item" style="margin-bottom: 16px"><a class="nav-link {{ active('admin.home.home.online.*') }}" href="{{ route('admin.home.home.online.index') }}"><i class="mdi mdi-cart-plus"></i> Заявки на онлайн консультацию</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.home.home.online.create') }}" href="{{ route('admin.home.home.online.create') }}"><i class="mdi mdi-cart-plus"></i> Записать на онлайн консультацию</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active('admin.calls.index') }}" href="{{ route('admin.calls.index') }}"><i class="mdi mdi-phone-in-talk"></i> Обр.звонок</a></li>
    {{--                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-headset"></i> Тех.поддержка</a></li>--}}
                    <hr>
                    @if(Route::currentRouteName() != 'admin.content.reviews.reviews.index')
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.content.reviews.reviews.index') }}"><i class="mdi mdi-star"></i> Отзывы</a></li>
                    @endif
                </ul>
            </div><!-- end Ecommerce -->

            <div id="MetricaApps" class="main-icon-menu-pane {{ active(['admin.services.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Услуги</h6>
                </div>
                <ul class="nav metismenu">
                    <li class="nav-item"><a class="nav-link {{ active(['admin.services.services.create']) }}" href="{{ route('admin.services.services.create') }}" style="margin-bottom: 16px"><i class="mdi mdi-plus"></i> Добавить услугу</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.services.categories.create']) }}" href="{{ route('admin.services.categories.create') }}" style="margin-bottom: 32px"><i class="mdi mdi-plus"></i> Добавить категорию</a></li>
                    <hr>
                <li class="nav-item"><a class="nav-link {{ active(['admin.services.services.index']) }}" href="{{ route('admin.services.services.index') }}"><i class="mdi mdi-dropbox"></i> Список услуг</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.services.categories.index']) }}" href="{{ route('admin.services.categories.index') }}">
                            <i class="mdi mdi-lan"></i>Список категорий</a>
                    </li>

                </ul>
            </div><!-- end Crypto -->

            <div id="MetricaPrice" class="main-icon-menu-pane {{ active(['admin.price.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Цены</h6>
                </div>
                <ul class="nav metismenu">
                    <li class="nav-item"><a class="nav-link {{ active('admin.price.direction.index') }}" href="{{ route('admin.price.direction.index') }}">Направления</a></li>
                    <hr>
                <li class="nav-item"><a class="nav-link  {{ active('admin.price.service.all_services') }}" href="{{ route('admin.price.service.all_services') }}"><i class="mdi mdi-format-list-bulleted"></i> Все услуги</a></li>
                    <hr>
                <li class="nav-item"><a class="nav-link  {{ active('admin.price.service.create_new_service') }}" href="{{ route('admin.price.service.create_new_service') }}"><i class="mdi mdi-plus"></i> Добавить цены</a></li>
                    <hr>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.price.service.code_disable') }}" style="color: red"><i class="mdi mdi-minus"></i>Быстро отключить показ кода</a></li>
                    <hr>
                    @foreach($directions as $direction)
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.price.category.index', ['direction_id' => $direction->id]) }}">- {{ $direction->name }}</a></li>
                    @endforeach
                </ul>
            </div><!-- end Crypto -->

            <div id="MetricaPages" class="main-icon-menu-pane {{ active(['admin.doctors.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Врачи</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ active(['admin.doctors.doctors.create']) }}" href="{{ route('admin.doctors.doctors.create') }}"><i class="mdi mdi-plus"></i>Добавить врача</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.doctors.professions.create']) }}" href="{{ route('admin.doctors.professions.create') }}"><i class="mdi mdi-plus"></i>Добавить специализацию</a></li>
                    <hr>
                    <li class="nav-item">
                        <a class="nav-link {{ active(['admin.doctors.doctors.*']) }}" href="{{ route('admin.doctors.doctors.index') }}">
                            <i class="ti ti-user"></i>  Список врачей</a>
                    </li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.doctors.professions.*') }}" href="{{ route('admin.doctors.professions.index') }}"><i class="ti ti-user"></i>  Список специализаций</a></li>
                </ul>
            </div><!-- end Pages -->

            <div id="MetricaPagesContent" class="main-icon-menu-pane {{ active(['admin.content.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Контент</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ active('admin.content.reviews.reviews.create') }}" href="{{ route('admin.content.reviews.reviews.create') }}"><i class="mdi mdi-plus"></i>Добавить отзыв</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.content.before_after.before_after.create') }}" href="{{ route('admin.content.before_after.before_after.create') }}"><i class="mdi mdi-plus"></i>Добавить до/после</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.content.actions.actions.create') }}" href="{{ route('admin.content.actions.actions.create') }}"><i class="mdi mdi-plus"></i>Добавить акцию</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active('admin.content.actions.actions.*') }}" href="{{ route('admin.content.actions.actions.index') }}"><i class="mdi  mdi-ticket-percent"></i>Список акций</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.content.reviews.reviews.*') }}" href="{{ route('admin.content.reviews.reviews.index') }}"><i class="mdi mdi-book-multiple"></i>Список отзывов</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.content.before_after.before_after.*') }}" href="{{ route('admin.content.before_after.before_after.index') }}"><i class="mdi mdi-book-open-page-variant"></i> Список до/после</a></li>
                </ul>
            </div><!-- end Pages -->

            <div id="pages" class="main-icon-menu-pane {{ active(['admin.pages.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Страницы</h6>
                </div>
                <ul class="nav metismenu">
                    <li class="nav-item"><a class="nav-link {{ active('admin.pages.pages.create') }}" href="{{ route('admin.pages.pages.create') }}"><i class="mdi mdi-plus"></i>Добавить страницу</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.pages.news.create') }}" href="{{ route('admin.pages.news.create') }}"><i class="mdi mdi-plus"></i>Добавить новость</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.pages.category.news.create']) }}" href="{{ route('admin.pages.category.news.create') }}"><i class="mdi mdi-plus"></i>Добавить категорию новости</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active('admin.pages.home.edit') }}" href="{{ route('admin.pages.home.edit') }}"><i class="mdi mdi-home"></i>Главная страница</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.pages.company.edit') }}" href="{{ route('admin.pages.company.edit', ['company' => 'company']) }}"><i class="mdi mdi-information"></i>О компании</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active('admin.pages.pages.*') }}" href="{{ route('admin.pages.pages.index') }}"><i class="mdi mdi-book-open-page-variant"></i> Страницы</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.pages.news.*']) }}" href="{{ route('admin.pages.news.index') }}"><i class="mdi mdi-book"></i>Новости</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.pages.category.news.*']) }}" href="{{ route('admin.pages.category.news.index') }}"><i class="mdi mdi-book-multiple"></i>Категории новостей</a></li>
                </ul><!--end nav-->
            </div><!-- end Others -->

            <div id="MetricaAuthentication" class="main-icon-menu-pane {{ active('admin.options.*') }}">
                <div class="title-box">
                    <h6 class="menu-title">Настройки</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ active('admin.options.menu.create') }}" href="{{ route('admin.options.menu.index') }}?menu=1"><i class="mdi mdi-book-multiple"></i>Меню</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.options.banners.list.create') }}" href="{{ route('admin.options.banners.list.create') }}"><i class="mdi mdi-book-multiple"></i>Добавить баннер</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active('admin.options.options.*') }}" href="{{ route('admin.options.options.index') }}"><i class="mdi mdi-book-multiple"></i>Список общих настроек</a></li>
                    <br>
                    <li class="nav-item"><a class="nav-link {{ active('admin.options.banners.*') }}" href="{{ route('admin.options.banners.list.index') }}"><i class="mdi mdi-book-multiple"></i>Список слайдеров, баннеров</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.seo.index') }}" href="{{ route('admin.seo.index') }}"><i class="mdi mdi-file-search-outline"></i>SEO</a></li>
                </ul>
            </div><!-- end Authentication-->

        </div><!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
