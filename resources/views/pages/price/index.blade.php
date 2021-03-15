@extends('layouts.index')

@section('header_style')
<style>
    .price-list-block .price-list-item{
        margin-bottom: auto;
    }
    .price-list-block .price-list-item:last-child{
        margin-bottom: 40px;
    }
    .price-list-block .price-list-item h4 {
        font-size: 20px;
    }
    .price-list-block .price-list-item h5 {
        font-size: 16px;
    }
    .price-list-block .price-list-item h6 {
        font-size: 14px;
    }
    .price-list-block .price-list-item h2 a,
    .price-list-block .price-list-item h4 a,
    .price-list-block .price-list-item h5 a,
    .price-list-block .price-list-item h6 a{
        color: #14387f;
    }
    .service-item .price{
        min-width: 120px;
    }
    .price-page .price-title-block .filter-block .search-price input{
        min-width: 140px;
    }
</style>
@endsection

@section('title')
    @parent - Цены
@endsection

@section('content')
    <section class="price-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                        <div class="crumbs">
                            <ol>

                            </ol>
                        </div>
                    @if($directions->count() > 0)
                    <div class="price-title-block">
                        <h1 class="title">Цены на услуги</h1>
                        <div class="filter-block">
                            <form action="{{ route('front.price.search') }}" class="search-price" method="post">
                                @csrf
                                <input type="text" name="search" placeholder="Поиск по названию">
                                <button class="btn-search"><i class="demo-icon icon-search"></i></button>

                                <div class="sort-box">
                                    <h4>Направление:</h4>
                                    <select name="pricedirection_id" id="">
                                        <option value="0">Все направления</option>
                                        @foreach($all_directions as $dir)
                                        <option value="{{ $dir->id }}">{{ $dir->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                        <div class="price-list-block">
@php
$shown_services = [];
@endphp
                            @foreach($directions as $direction)
                            <div class="price-list-item" style="margin-bottom: 40px">
                                @if($direction->services->count() > 0)
                                <div class="left">
                                    <h3><a href="#">{{ $direction->name }}</a></h3>
                                </div>
                                @endif
                                <div class="right">
                                    @foreach($direction->services as $service)
                                        @if($service->type == 1 and !in_array($service->id, $shown_services))
                                            @php($shown_services[] = $service->id)
                                            @if($service->children->count() > 0)
                                                <div class="service-item service-item-blue">
                                                    <div class="title">{{ $service->name }}</div>
                                                </div>
                                            @endif
                                            @if($service->type == 1 and $service->children->count() > 0)
                                                @foreach($service->children as $child)
                                                    @if(in_array($child->id, $shown_services))
                                                        @continue
                                                    @endif
                                                    @php($shown_services[] = $child->id)
                                                    <div class="service-item">
                                                        <div class="title">{{ $child->name }} @if($child->show_code == '1') {{ $child->code }} @endif</div>
                                                        @if(!is_null($child->discount_price) and $child->discount_price != '')
                                                            <div class="price">{{ $child->discount_price }} ₽</div>
                                                        @else
                                                            <div class="price">{{ $child->price }} ₽</div>
                                                        @endif
                                                        <div class="order">
                                                            <a href="#order" data-service-id="{{ $child->id }}" onclick="setService(this)" class="btn btn-indigo btn-order popup-with-form">Записаться на прием</a>
                                                        </div>
                                                    </div>
                                                    @if($loop->iteration == 2)
                                                        @break
                                                    @endif
                                                @endforeach
                                                @if($service->children->count() > 2)
                                                    <div class="hidden-part">
                                                        @foreach($service->children as $child)
                                                            @if(in_array($child->id, $shown_services))
                                                                @continue
                                                            @endif
                                                            @php($shown_services[] = $child->id)
                                                            <?php
                                                                if($loop->iteration < 2){
                                                                    continue;
                                                                }
                                                                ?>
                                                            <div class="service-item">
                                                                <div class="title">{{ $child->name }} @if($child->show_code == '1') {{ $child->code }} @endif</div>
                                                                <div class="price">{{ $child->price }} ₽</div>
                                                                <div class="order">
                                                                    <a href="#order" data-service-id="{{ $child->id }}" onclick="setService(this)" class="btn btn-indigo btn-order popup-with-form">Записаться на прием</a>
                                                                </div>
                                                            </div>

                                                        @endforeach
                                                    </div>
                                                    <button class="open-price-list">Развернуть таблицу</button>
                                                @endif
                                            @endif
                                        @elseif($service->type == 2 and !in_array($service->id, $shown_services))
                                            @php($shown_services[] = $service->id)
                                            <div class="service-item">
                                                <div class="title">{{ $service->name }} @if($service->show_code == '1') {{ $service->code }} @endif</div>
                                                <div class="price">{{ $service->price }} ₽</div>
                                                <div class="order"><a href="#order" data-service-id="{{ $service->id }}" onclick="setService(this)" class="btn btn-indigo btn-order popup-with-form">Записаться на прием</a></div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @endforeach

                        </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
