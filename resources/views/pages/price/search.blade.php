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


@section('content')
    <section class="price-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                        <div class="crumbs">
                            <ol>

                            </ol>
                        </div>

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

                        <div class="price-list-block">

                            @foreach($directions as $direction => $services)
                            <div class="price-list-item" style="margin-bottom: 40px">
                                <div class="left">
                                    <h3><a href="#">{{ $direction }}</a></h3>
                                </div>

                                <div class="right">
                                    @foreach($services as $service)
                                        @if($service->type == 2)
                                        <div class="service-item">
                                            <div class="title">{{ $service->name }}</div>
                                            <div class="price">{{ $service->price }} ₽</div>
                                            <div class="order"><a href="#order" class="btn btn-indigo btn-order popup-with-form">Записаться на прием</a></div>
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
