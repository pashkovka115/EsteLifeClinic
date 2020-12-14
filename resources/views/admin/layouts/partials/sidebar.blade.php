 <style>
     .main-menu-inner .menu-body .nav-link{
        padding: 0 !important;
     }
 </style>
 <!-- leftbar-tab-menu -->
 <div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="{{ route('admin.index') }}" class="logo logo-metrica d-block text-center">
            <span>
                <img src="{{ URL::asset('assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <nav class="nav">
        <a href="#MetricaEcommerce" class="nav-link {{ active('admin.index') }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Главная" data-trigger="hover">
                <i data-feather="home" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaEcommerce-->

            <a href="#MetricaApps" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Услуги" data-trigger="hover">
                <i data-feather="shopping-cart" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaApps-->

            <a href="#MetricaPages" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Врачи" data-trigger="hover">
                <i data-feather="users" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaPages-->

            <a href="#beforeAfter" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="До/После" data-trigger="hover">
                <i data-feather="book-open" class="align-self-center menu-icon icon-dual"></i>
            </a> <!--end MetricaAuthentication-->

            <a href="#pages" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Страницы" data-trigger="hover">
                <i data-feather="book-open" class="align-self-center menu-icon icon-dual"></i>
            </a> <!--end MetricaAuthentication-->

            <a href="#MetricaReviews" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Отзывы" data-trigger="hover">
                <i data-feather="settings" class="align-self-center menu-icon icon-dual"></i>
            </a>

            <a href="#MetricaAuthentication" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Настройки" data-trigger="hover">
                <i data-feather="settings" class="align-self-center menu-icon icon-dual"></i>
            </a> <!--end MetricaAuthentication-->

            <a href="#MetricaUikit" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Акции и скидки" data-trigger="hover">
                <i data-feather="credit-card" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaUikit-->

            <a href="#MetricaUsers" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Администратор" data-trigger="hover">
                <i data-feather="users" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaPages-->

        </nav><!--end nav-->
        {{-- <div class="pro-metrica-end">
            <a href="" class="help" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Тех.поддержка">
                <i data-feather="message-circle" class="align-self-center menu-icon icon-md icon-dual mb-4"></i>
            </a>
            <a href="" class="profile">
                <img src="{{ URL::asset('assets/images/users/user-4.jpg')}}" alt="profile-user" class="rounded-circle thumb-sm">
            </a>
        </div> --}}
    </div><!--end main-icon-menu-->

    <div class="main-menu-inner active">

        <div class="menu-body slimscroll">
        <div id="MetricaEcommerce" class="main-icon-menu-pane {{ active('admin.index') }}">
                <div class="title-box">
                    <h6 class="menu-title">Главная</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ active(['admin.index']) }}" href="#"><i class="mdi mdi-home"></i> Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-cart-plus"></i> Статистика</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-cart-plus"></i> Запись на прием</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-phone-in-talk"></i> Обр.звонок</a></li>
{{--                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-headset"></i> Тех.поддержка</a></li>--}}
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-star"></i> Отзывы</a></li>
                </ul>
            </div><!-- end Ecommerce -->

            <div id="MetricaApps" class="main-icon-menu-pane {{ active(['admin.services.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Услуги</h6>
                </div>
                <ul class="nav metismenu">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="javascript: void(0);"><span class="w-100">Email</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="../apps/email-inbox">Inbox</a></li>
                            <li><a href="../apps/email-read">Read Email</a></li>
                        </ul>
                    </li><!--end nav-item--> --}}
                    <li class="nav-item"><a class="nav-link {{ active(['admin.services.services.create']) }}" href="{{ route('admin.services.services.create') }}"><i class="mdi mdi-plus"></i> Добавить услугу</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.services.categories.create']) }}" href="{{ route('admin.services.categories.create') }}"><i class="mdi mdi-plus"></i> Добавить категорию</a></li>
                    <hr>
                <li class="nav-item"><a class="nav-link {{ active(['admin.services.services.index']) }}" href="{{ route('admin.services.services.index') }}"><i class="mdi mdi-dropbox"></i> Список услуг</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.services.categories.index']) }}" href="{{ route('admin.services.categories.index') }}">
                            <i class="mdi mdi-lan"></i>Список категорий услуг</a>
                    </li>
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
                        <a class="nav-link {{ active(['admin.doctors.doctors.index']) }}" href="{{ route('admin.doctors.doctors.index') }}">
                            <i class="ti ti-user"></i>  Список врачей</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.doctors.professions.index') }}"><i class="ti ti-user"></i>  Список специализаций</a></li>
                </ul>
            </div><!-- end Pages -->

            <div id="beforeAfter" class="main-icon-menu-pane {{ active('admin.before_after.*') }}">
                <div class="title-box">
                    <h6 class="menu-title">До/После</h6>
                </div>
                <ul class="nav metismenu">
                    <li class="nav-item"><a class="nav-link {{ active('admin.before_after.before_after.create') }}" href="{{ route('admin.before_after.before_after.create') }}"><i class="mdi mdi-plus"></i>Добавить до/после</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active('admin.before_after.before_after.index') }}" href="{{ route('admin.before_after.before_after.index') }}"><i class="mdi mdi-book-open-page-variant"></i> Список до/после</a></li>
                </ul><!--end nav-->
            </div><!-- end Others -->

            <div id="pages" class="main-icon-menu-pane {{ active(['admin.pages.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Страницы</h6>
                </div>
                <ul class="nav metismenu">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i>Добавить страницу</a></li>
                    <li class="nav-item"><a class="nav-link {{ active('admin.pages.news.create') }}" href="{{ route('admin.pages.news.create') }}"><i class="mdi mdi-plus"></i>Добавить новость</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.pages.category.news.create']) }}" href="{{ route('admin.pages.category.news.create') }}"><i class="mdi mdi-plus"></i>Добавить категорию новости</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-home"></i>Главная страница</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-information"></i>О компании</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-contacts"></i> Контакты</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book-open-page-variant"></i> Страницы</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.pages.news.index']) }}" href="{{ route('admin.pages.news.index') }}"><i class="mdi mdi-book"></i>Новости</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.pages.category.news.index']) }}" href="{{ route('admin.pages.category.news.index') }}"><i class="mdi mdi-book-multiple"></i>Категории новостей</a></li>
                </ul><!--end nav-->
            </div><!-- end Others -->

            <div id="MetricaReviews" class="main-icon-menu-pane {{ active(['admin.reviews.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Отзывы</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link {{ active(['admin.reviews.reviews.create']) }}" href="{{ route('admin.reviews.reviews.create') }}"><i class="mdi mdi-plus"></i>Добавить отзыв</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.reviews.reviews.index']) }}" href="{{ route('admin.reviews.reviews.index') }}"><i class="mdi mdi-book-multiple"></i>Список отзывов</a></li>
                </ul>
            </div>

            <div id="MetricaAuthentication" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Настройки</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book-multiple"></i>Шапка</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book-multiple"></i>Подвал</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-file-search-outline"></i>SEO</a></li>
                </ul>
            </div><!-- end Authentication-->

            <div id="MetricaUikit" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Акции и скидки</h6>
                </div>
                <ul class="nav metismenu">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i>Добавить купон</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i>Добавить скидку</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi dripicons-graph-line"></i>Группы скидок</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi  mdi-ticket-percent"></i>Список купонов</a></li>
                    <br>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi dripicons-browser"></i>Редактор цен</a></li>
                </ul><!--end nav-->
            </div><!-- end Others -->

            <div id="MetricaUsers" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Администратор</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.administrator.administrator.index') }}"><i class="ti ti-user"></i>  Редактировать профиль</a></li>
                </ul>
            </div><!-- end Pages -->

        </div><!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
