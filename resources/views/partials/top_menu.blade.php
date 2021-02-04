<div id="sticky-wrapper" class="sticky-wrapper" style="height: 71px;">
    <section class="navigation" style="width: 1905px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav>
                        <ul>
                        <?php
                        foreach ($top_menu as $item){

                            if (count($item['child']) > 0){
                            echo '<li><a href="'.$item['link'].'">'.$item['label'].' <i class="demo-icon icon-arrow-down"></i></a>';
                                ?>
                                @include('partials.menu.custom-menu-items', ['items' => $item['child']])
                            <?php
                            echo '</li>';
                            }else{
                                echo '<li><a href="'.$item['link'].'">'.$item['label'].'</a></li>';
                            }
                        }
                        ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</div>

