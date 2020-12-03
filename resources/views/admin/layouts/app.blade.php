<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">

        @yield('headerStyle')
        
        <!-- App css -->
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
        <style>
            .nav-link{
                font-family: 'Ubuntu', sans-serif !important;

                font-weight: 400;
                font-size: 13.5px !important;
            }
        </style>
    </head>

    <body>




        @include('admin.layouts.partials.sidebar')
        @include('admin.layouts.partials.topbar')

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

               

                <div class="container-fluid ">
                   
                    <div class="row">
                        <div class="col-12 ">
                            @include('flash::message')
                        </div>
                    </div>
    
                    @if(Route::current()->getName() != 'admin.index')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="float-right">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item">
                                      <a href="{{ route('admin.index') }}">Главная</a></li>
                                      @yield('breadcrumbs')
                                    </ol>
                                 </div>
                                <h4 class="page-title">@yield('pageName')</h4>
                        </div><!--end page-title-box-->
                            </div><!--end col-->
                        </div>
                        @endif

                    <!-- content -->
             @yield('content')
                          
                </div>
                

           

             <!-- extra Modal -->
             @include('layouts/partials/extra-modal')

              <!-- Footer -->
              @include('admin.layouts.partials.footer')

            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/jquery-ui.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/metismenu.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/waves.js') }}"></script>
        <script src="{{ URL::asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/apexcharts/apexcharts.min.js') }}"></script>
        
        <!-- footerScript -->
        @yield('footerScript')

        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.js') }}"></script>        
    </body>
</html>