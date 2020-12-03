@extends('admin.layouts.app')

@section('title', 'Товары')
@section('pageName', 'Список поставщиков')
@section('breadcrumbs')
{{-- <li class="breadcrumb-item"><a href="javascript:void(0);">2й</a></li> --}}
<li class="breadcrumb-item active">Товары</li>
<li class="breadcrumb-item active">Список поставщиков</li>
@stop

@section('headerStyle')
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
  
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary"><i class="fas fa-plus"></i> Добавить</button>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            </thead>
<tbody>
    <tr>
      
        <td>
            <a href="">Faldi</a>
        </td>
       
       
        <td>
            <a href=""><i class="far fa-eye text-primary mr-1"></i></a>
            <a href=""><i class="far fa-edit text-warning mr-1"></i></a>
            <a href=""><i class="fas fa-credit-card text-success mr-1"></i></a>
            
        </td>
    </tr>
</tbody>

     
     
        </table>        
   
   
    </div>
</div>

@stop

@section('footerScript')
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script>
            $('#datatable').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Russian.json"
            }
            }
                
            );
        </script>
@stop