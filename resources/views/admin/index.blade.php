@extends('admin.layouts.app')

@section('title', 'Germes-shop | Админ-панель')

@section('headerStyle')
        <link href="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
        <link href="{{ URL::asset('plugins/lightpick/lightpick.css')}}" rel="stylesheet" />
@stop

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">

                <div class="col-lg-2">
                    <div class="card dash-data-card text-center">
                        <div class="card-body">
                            <div class="icon-info mb-3">
                                <i class="fas fa-pencil-alt bg-soft-success"></i>
                            </div>
                            <h3 class="text-dark">{{ $appointments }}</h3>
                            <h6 class="font-14 text-dark"><a href="{{ route('admin.home.home.appointments.index') }}">Записано на приём</a></h6>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!-- end col-->

                <div class="col-lg-2">
                    <div class="card dash-data-card text-center">
                        <div class="card-body">
                            <div class="icon-info mb-3">
                                <i class="fas fa-people-carry bg-soft-warning"></i>
                            </div>
                            <h3 class="text-dark">{{ $services }}</h3>
                            <h6 class="font-14 text-dark"><a href="{{ route('admin.services.services.index') }}">Услуг</a></h6>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!-- end col-->

                <div class="col-lg-2">
                    <div class="card dash-data-card text-center">
                        <div class="card-body">
                            <div class="icon-info mb-3">
                                <i class="far fa-plus-square bg-soft-danger"></i>
                            </div>
                            <h3 class="text-dark">{{ $doctors }}</h3>
                            <h6 class="font-14 text-dark"><a href="{{ route('admin.doctors.doctors.index') }}">Врачей</a></h6>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!-- end col-->

                <div class="col-lg-2">
                    <div class="card dash-data-card text-center">
                        <div class="card-body">
                            <div class="icon-info mb-3">
                                <i class="fab fa-angellist bg-soft-classic"></i>
                            </div>
                            <h3 class="text-dark">{{ $reviews }}</h3>
                            <h6 class="font-14 text-dark"><a href="{{ route('admin.content.reviews.reviews.index') }}">Отзывы</a></h6>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!-- end col-->

                <div class="col-lg-2">
                    <div class="card dash-data-card text-center">
                        <div class="card-body">
                            <div class="icon-info mb-3">
                                <i class="fas fa-ticket-alt bg-soft-info"></i>
                            </div>
                            <h3 class="text-dark">{{ $posts }}</h3>
                            <h6 class="font-14 text-dark"><a href="{{ route('admin.pages.news.index') }}">Новости</a></h6>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!-- end col-->

                <div class="col-lg-2">
                    <div class="card dash-data-card text-center">
                        <div class="card-body">
                            <div class="icon-info mb-3">
                                <i class="fas fa-ticket-alt bg-soft-purple"></i>
                            </div>
                            <h3 class="text-dark">{{ $actions }}</h3>
                            <h6 class="font-14 text-dark"><a href="{{ route('admin.content.actions.actions.index') }}">Акции и скидки</a></h6>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!-- end col-->

            </div>
        </div>
    </div>
@stop

@section('footerScript')
<script src="{{ URL::asset('plugins/chartjs/chart.min.js')}}"></script>
<script src="{{ URL::asset('plugins/chartjs/roundedBar.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{ URL::asset('assets/pages/jquery.ecommerce_dashboard.init.js')}}"></script>
@stop
