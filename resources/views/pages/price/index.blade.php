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
                            <li><a href="">Все акции</a></li>
                            <li>Программа обследования «Мужчины 40+»</li>
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
                                    <select name="slug" id="">
                                        <option value="0">Все направления</option>
                                        @foreach($all_categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    function tree($children, $level){
                        if ($level < 6){
                            $level++;
                        }
                        foreach ($children as $cat){
                            $services = $cat->services;
                            if ($services->count() > 0){
                    ?>
                    <div class="price-list-item">
                        <div class="left">
                            <h{{ $level }}><a href="{{ route('front.price.show.category', ['slug' => $cat->slug]) }}">{{ $cat->name }}</a></h{{ $level }}>
    {{--                        <p class="label"><a href="">Инвазивная косметология</a></p>--}}
                        </div>
                        <div class="right">
                            <div class="service-item service-item-blue">
                                <div class="title">{{ $cat->name }}</div>
                            </div>

                            <div class="service-item">
                                <div class="title"><?= $services[0]->name ?></div>
                                <div class="price"><?= $services[0]->price ?> ₽</div>
                                <div class="order"><a href="#order" class="btn btn-indigo btn-order popup-with-form">Записаться на прием</a></div>
                            </div>

                            <div class="hidden-part">
                                <?php
                                foreach($services as $key => $service):
                                if ($key == 0){
                                    continue;
                                }
                                ?>
                                    <div class="service-item">
                                        <div class="title"><?= $service->name ?></div>
                                        <div class="price"><?= $service->price ?> ₽</div>
                                        <div class="order"><a href="#order" class="btn btn-indigo btn-order popup-with-form">Записаться на прием</a></div>
                                    </div>
                                <?php
                                endforeach; ?>
                            </div>
                            <button class="open-price-list">Развернуть таблицу</button>
                        </div>
                    </div>
                    <?php
                    }
                        tree($cat->children, $level);
                        }
                    }
                    ?>

                    <div class="price-list-block">
                        <?php tree($categories, 1); ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_script')

@endsection
