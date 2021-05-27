<section style="background-image: url(img/hero_bg_4.jpg);"  data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center probootstrap-animate">
                <div class="probootstrap-heading">
                    <h2 class="primary-heading"   data-section="menu">Menu</h2>
                    <h3 class="secondary-heading">Наше меню</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

    $dish = $menu['dish'];
    $menu_items = $menu["menu_items"];

?>
<section class="probootstrap-section probootstrap-bg-white">
    <div class="works__nav " style="text-align: center">
        <a class="works__nav-link" href="#" data-filter="all">Все меню</a>
        @foreach($menu_items as $menu_item)
        <a class="works__nav-link" href="#" data-filter="{{ $menu_item->id }}">{{ $menu_item->name }}</a>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="menus">
                    @for($i = 0; $i < count($dish); $i += 2)
                        <?php
                            $el = $dish[$i];
                        ?>
                    <li data-cat="{{ $el->menu_item->id }}">
                        <figure class="image"><img src="{{ asset("storage/dish_images/".$el->image_url)  }}"></figure>
                        <div class="text">
                            <span class="price">{{ $el->price }} ₽</span>
                            <h3>{{ $el->name }}</h3>
                            <p>{{ $el->description }}</p>
                        </div>
                    </li>
                    @endfor
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="menus">
                    @for($i = 1; $i < count($dish); $i += 2)
                        <?php
                        $el = $dish[$i];
                        ?>
                        <li data-cat="{{ $el->menu_item->id }}">
                            <figure class="image"><img src="{{ asset("storage/dish_images/".$el->image_url)  }}"></figure>
                            <div class="text">
                                <span class="price">{{ $el->price }} ₽</span>
                                <h3>{{ $el->name }}</h3>
                                <p>{{ $el->description }}</p>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</section>
