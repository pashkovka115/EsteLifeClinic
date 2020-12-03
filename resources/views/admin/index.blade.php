@extends('admin.layouts.app')

@section('title', 'Germes-shop | Админ-панель')

@section('headerStyle')
        <link href="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
        <link href="{{ URL::asset('plugins/lightpick/lightpick.css')}}" rel="stylesheet" />
@stop

@section('content')
  
<p>Привет!</p>

@stop

@section('footerScript')
<script src="{{ URL::asset('plugins/chartjs/chart.min.js')}}"></script>
<script src="{{ URL::asset('plugins/chartjs/roundedBar.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{ URL::asset('assets/pages/jquery.ecommerce_dashboard.init.js')}}"></script> 
@stop