@extends('admin.layouts.app')

@section('title', 'Товары')
@section('pageName', 'Список товаров')
@section('breadcrumbs')
{{-- <li class="breadcrumb-item"><a href="javascript:void(0);">2й</a></li> --}}
<li class="breadcrumb-item active">Товары</li>
<li class="breadcrumb-item active">Список товаров</li>
@stop

@section('headerStyle')
<link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
  
<div class="card">
    <div class="card-header">
        <button class="btn btn-primary"><i class="fas fa-plus"></i> Добавить</button>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-cart-plus"></i> Импорт</button>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Категория</th>
                <th>Поставщик</th>
                <th>Цена за ед.</th>
                <th>Наличие</th>
                <th>Действия</th>
            </tr>
            </thead>
<tbody>
    <tr>
        <td>
            <p class="d-inline-block align-middle mb-0">
                <a href="" class="d-inline-block align-middle mb-0 product-name">Подвесной светильник Тор-Эко 08219</a> 
                <br>
                <span class="text-muted font-13">08219-0320</span> 
            </p>
        </td>
        <td>
            <a href="">Люстры</a>
        </td>
        <td>
            <a href="">Faldi</a>
        </td>
        <td>15800</td>
        <td><span class="badge badge-soft-warning">В наличии - 2 шт.</span></td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Импорт товара</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Выберите поставщика</label>
                <select name="" id="" class="form-control">
                    <option value="">faldi</option>
                </select>
            </div>
          <div class="form-group">
              <label for="">Выберите файл excel</label>
              <input type="file" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Импорт</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
        </div>
      </div>
    </div>
  </div>
@stop