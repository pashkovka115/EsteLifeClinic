
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-right mb-0">


                    <li class=" notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" target="_blank"  href="/"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ti-eye noti-icon"></i>
                        </a>
                    </li>

                    {{-- <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="ti-bell noti-icon"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg pt-0">

                            <h6 class="dropdown-item-text font-15 m-0 py-3 bg-primary text-white d-flex justify-content-between align-items-center">
                                Уведомления <span class="badge badge-light badge-pill">2</span>
                            </h6>
                            <div class="slimscroll notification-list">
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-right text-muted pl-2">2 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-primary">
                                           <i class="la la-cart-arrow-down text-white"></i>
                                        </div>
                                        <div class="media-body align-self-center ml-2 text-truncate">
                                            <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-right text-muted pl-2">10 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-success">
                                            <i class="la la-group text-white"></i>
                                        </div>
                                        <div class="media-body align-self-center ml-2 text-truncate">
                                            <h6 class="my-0 font-weight-normal text-dark">Meeting with designers</h6>
                                            <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-right text-muted pl-2">40 min ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-pink">
                                            <i class="la la-list-alt text-white"></i>
                                        </div>
                                        <div class="media-body align-self-center ml-2 text-truncate">
                                            <h6 class="my-0 font-weight-normal text-dark">UX 3 Task complete.</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-right text-muted pl-2">1 hr ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-warning">
                                            <i class="la la-truck text-white"></i>
                                        </div>
                                        <div class="media-body align-self-center ml-2 text-truncate">
                                            <h6 class="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                            <small class="text-muted mb-0">It is a long established fact that a reader.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                                <!-- item-->
                                <a href="#" class="dropdown-item py-3">
                                    <small class="float-right text-muted pl-2">2 hrs ago</small>
                                    <div class="media">
                                        <div class="avatar-md bg-info">
                                            <i class="la la-check-circle text-white"></i>
                                        </div>
                                        <div class="media-body align-self-center ml-2 text-truncate">
                                            <h6 class="my-0 font-weight-normal text-dark">Payment Successfull</h6>
                                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                                        </div><!--end media-body-->
                                    </div><!--end media-->
                                </a><!--end-item-->
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li> --}}

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            {{-- <img src="{{ URL::asset('assets/images/users/user-4.jpg')}}" alt="profile-user" class="rounded-circle" />  --}}
                            <span class="ml-1 nav-user-name hidden-sm">Admin <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('admin.administrator.administrator.index') }}"><i class="dripicons-user text-muted mr-2"></i> Профиль</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="document.getElementById('form_logout').submit(); return false;">
                                <i class="dripicons-exit text-muted mr-2"></i> Выйти</a>
                            <form id="form_logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>


                        </div>
                    </li>
                    {{-- <li class="mr-2">
                        <a href="#" class="nav-link" data-toggle="modal" data-animation="fade" data-target=".modal-rightbar">
                            <i data-feather="align-right" class="align-self-center"></i>
                        </a>
                    </li> --}}
                </ul><!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <a href="/crm/crm-index">
                            <span class="responsive-logo">
                                <img src="{{ URL::asset('assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm align-self-center" height="34">
                            </span>
                        </a>
                    </li>
                    <li>
                        <button class="button-menu-mobile nav-link">
                            <i data-feather="menu" class="align-self-center"></i>
                        </button>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="ml-1 p-2 bg-soft-classic nav-user-name hidden-sm rounded">Быстрый доступ <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-xl dropdown-menu-left p-0">
                            <div class="row no-gutters">
                                <div class="col-12 col-lg-12">

                                    <div class="p-4">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="divider-custom mt-0">
                                                    <div class="divider-text bg-light">Товары</div>
                                                </div>
                                                <a class="dropdown-item mb-2" href="/analytics/analytics-index"> Добавить товар</a>
                                                <a class="dropdown-item mb-2" href="/crypto/crypto-index"> Добавить категорию</a>
                                                <a class="dropdown-item mb-2" href="/crm/crm-index"> Добавить тег</a>
                                                <a class="dropdown-item" href="/projects/projects-index"> Добавить параметр</a>
                                            </div>
                                            <div class="col-4">
                                                <div class="divider-custom mt-0">
                                                    <div class="divider-text bg-light">Продажи</div>
                                                </div>
                                                <a class="dropdown-item mb-2" href="/ecommerce/ecommerce-index"> Новые продажи</a>
                                                <a class="dropdown-item mb-2" href="/helpdesk/helpdesk-index"> Возвраты</a>
                                                <a class="dropdown-item" href="/hospital/hospital-index"> Отчеты</a>
                                            </div>
                                            <div class="col-4">
                                                <div class="divider-custom mt-0">
                                                    <div class="divider-text bg-light">Цены и скидки</div>
                                                </div>
                                                <a class="dropdown-item mb-2" href="/ecommerce/ecommerce-index"> Цены</a>
                                                <a class="dropdown-item mb-2" href="/helpdesk/helpdesk-index"> Купоны</a>
                                                <a class="dropdown-item" href="/hospital/hospital-index"> Скидки</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </li>

                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
