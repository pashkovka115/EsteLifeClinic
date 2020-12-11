@extends('admin.layouts.app')

@section('title', 'Пусто')
@section('pageName', 'Пусто')
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="">Товары</a></li>
<li class="breadcrumb-item active">Категории</li>
@endsection
@section('headerStyle')

@stop

@section('content')
  
<div class="card">
    <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Добавить</button>
    </div>
    <div class="card-body">
        // 
    </div>
</div>

@stop

@section('footerScript')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Добавить</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Отмена</button>
        </div>
      </div>
    </div>
  </div>
@stop