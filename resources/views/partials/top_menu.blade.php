<section class="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                function cats_menu($categories){
                    $str = '<ul>';
                    foreach ($categories as $category){
                        if ($category->children->count() > 0){
                            $ico = ' <i class="demo-icon icon-arrow-right"></i>';
                        }else{ $ico = ''; }
                        $str .= '<li><a>' . $category->name . $ico . '</a>';
                        if ($category->children->count() > 0){
                            $str .= cats_menu($category->children);
                        }
                        $str .= '</li>';
                    }
                    $str .= '</ul>';

                    return $str;
                }
                ?>
                <nav>
                    <ul>
                        <li><a href="#">Косметология <i class="demo-icon icon-arrow-down"></i></a>
                            <?php
                            echo cats_menu($cats_menu);
                            ?>
                        </li>
                        <li><a href="#">Медицина <i class="demo-icon icon-arrow-down"></i></a>
                            <?php
                            echo cats_menu($cats_menu);
                            ?>
                        </li>
                        <li><a href="{{ route('front.price') }}" class="{{ active('front.price', 'red-link') }}">Цены</a></li>
                        <li><a href="{{ route('front.actions.index') }}" class="{{ active('front.actions*', 'red-link') }}">Акции</a></li>
                        <li><a class="{{ active('front.doctors*', 'red-link') }}" href="#">Врачи <i class="demo-icon icon-arrow-down"></i></a>
                            <ul>
                                @foreach($top_menu_professions as $profession)
                                    @if($profession->doctors->count() > 0)
                                        <li><a href="{{ route('front.doctors.professions', ['profession' => $profession->slug]) }}">{{ $profession->name }} <i class="demo-icon icon-arrow-right"></i></a>
                                        <ul>
                                            @foreach($profession->doctors as $doctor)
                                                <li><a href="{{ route('front.doctors.show', ['slug' => $doctor->slug]) }}">{{ $doctor->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <li><a href="{{ route('front.doctors.professions', ['profession' => $profession->slug]) }}">{{ $profession->name }}</a>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a class="{{ active('front.before_after*', 'red-link') }}" href="{{ route('front.before_after.index') }}">До/После</a></li>
                        <li><a class="{{ active('front.about.company', 'red-link') }}" href="{{ route('front.about.company') }}">О нас</a></li>
                        <li><a class="{{ active('front.contact', 'red-link') }}" href="{{ route('front.contact') }}">Контакты</a></li>
                        <li><a href="#">Наш магазин</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
