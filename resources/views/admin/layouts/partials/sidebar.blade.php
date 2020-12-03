 <style>
     .main-menu-inner .menu-body .nav-link{
        padding: 0 !important;
     }
 </style>
 <!-- leftbar-tab-menu -->
 <div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="/ecommerce/ecommerce-index" class="logo logo-metrica d-block text-center">
            <span>
                <img src="{{ URL::asset('assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <nav class="nav">
        <a href="#MetricaEcommerce" class="nav-link {{ active('admin.index') }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Главная" data-trigger="hover">
                <i data-feather="home" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaEcommerce-->  


            <a href="#sales" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Продажи" data-trigger="hover">
                <i data-feather="pie-chart" class="align-self-center menu-icon icon-dual"></i>             
            </a><!--end MetricaPages-->

            <a href="#MetricaApps" class="nav-link {{ active(['admin.products.*']) }}" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Товары" data-trigger="hover">
                <i data-feather="shopping-cart" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaApps-->

            <a href="#MetricaUikit" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Цены и скидки" data-trigger="hover">
                <i data-feather="credit-card" class="align-self-center menu-icon icon-dual"></i>
            </a><!--end MetricaUikit-->

            <a href="#MetricaPages" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Пользователи" data-trigger="hover">
                <i data-feather="users" class="align-self-center menu-icon icon-dual"></i>             
            </a><!--end MetricaPages-->

            <a href="#pages" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Страницы" data-trigger="hover">
                <i data-feather="book-open" class="align-self-center menu-icon icon-dual"></i>
            </a> <!--end MetricaAuthentication--> 

            <a href="#MetricaAuthentication" class="nav-link" data-toggle="tooltip-custom" data-placement="right" title="" data-original-title="Настройки" data-trigger="hover">
                <i data-feather="settings" class="align-self-center menu-icon icon-dual"></i>
            </a> <!--end MetricaAuthentication--> 

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
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-cart-plus"></i> Новые заказы</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-phone-in-talk"></i> Обр.звонок</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-headset"></i> Тех.поддержка</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-star"></i> Отзывы</a></li>
                </ul>
            </div><!-- end Ecommerce -->
            <div id="sales" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Продажи</h6>        
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link " href="#"><i class="mdi mdi-cart-plus"></i>  Новые продажи</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-arrow-top-left"></i> Возвраты/Отмены</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-cart"></i>  Продажи</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi dripicons-graph-pie"></i>  Отчеты</a></li>
                </ul>
            </div><!-- end sales -->
            <div id="MetricaApps" class="main-icon-menu-pane {{ active(['admin.products.*']) }}">
                <div class="title-box">
                    <h6 class="menu-title">Товары</h6>
                </div>
                <ul class="nav metismenu">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="javascript: void(0);"><span class="w-100">Email</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="../apps/email-inbox">Inbox</a></li>
                            <li><a href="../apps/email-read">Read Email</a></li>            
                        </ul>            
                    </li><!--end nav-item--> --}}
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i> Добавить товар</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i> Добавить категорию</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i> Добавить тег</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i> Добавить поставщика</a></li>
                    <hr>
                <li class="nav-item"><a class="nav-link {{ active(['admin.products.products.index']) }}" href="{{ route('admin.products.products.index') }}"><i class="mdi mdi-dropbox"></i> Список товаров</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-lan"></i>Список категорий</a></li>
                    <li class="nav-item"><a class="nav-link {{ active(['admin.products.suppliers.index']) }}" href="{{ route('admin.products.suppliers.index') }}"><i class="mdi mdi-truck-delivery"></i>Список поставщиков</a></li> 
                    <hr> 
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-label"></i>Список тегов</a></li>                          
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-information-outline"></i>Характеристики</a></li>     
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-export"></i>Экспорт товаров</a></li>                    
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-yandex ml-1"></i>Экспорт в Я.Маркет</a></li>     
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-file-search-outline"></i>SEO</a></li>           
                </ul>
            </div><!-- end Crypto -->
            
            <div id="MetricaUikit" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Цены и скидки</h6>      
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

            <div id="MetricaPages" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Пользователи</h6>        
                </div>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti ti-user"></i>  Список пользователей</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-star"></i> Отзывы</a></li>
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="ti ti-email"></i>Email-рассылка</a></li>
                </ul>
            </div><!-- end Pages -->

            <div id="pages" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Страницы</h6>      
                </div>
                <ul class="nav metismenu">                                
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i>Добавить страницу</a></li>  
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-plus"></i>Добавить статью</a></li>  
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-home"></i>Главная страница</a></li>  
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-information"></i>О компании</a></li>  
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-contacts"></i> Контакты</a></li>  
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book-open-page-variant"></i> Страницы</a></li>  
                    <hr> 
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book"></i>Статьи блога</a></li>  
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-book-multiple"></i>Категории блога</a></li>  
                    <hr>
                    <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-file-search-outline"></i>SEO</a></li>
                </ul><!--end nav-->
            </div><!-- end Others -->

            <div id="MetricaAuthentication" class="main-icon-menu-pane">
                <div class="title-box">
                    <h6 class="menu-title">Настройки</h6>     
                </div>
                <ul class="nav">
                    {{-- <li class="nav-item"><a class="nav-link" href="../authentication/auth-login">Log in</a></li> --}}
                </ul>
            </div><!-- end Authentication-->
        </div><!--end menu-body-->
    </div><!-- end main-menu-inner-->
</div>
<!-- end leftbar-tab-menu-->
