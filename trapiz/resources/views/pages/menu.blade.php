<section style="background-image: url(img/hero_bg_4.jpg);" data-section="menu" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="probootstrap-heading">
                    <h2 class="primary-heading">Menu</h2>
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
        <a class="navbar-link" href="#" data-filter="all">Все меню</a>
        @foreach($menu_items as $menu_item)
            <a class="navbar-link" href="#" data-filter="{{ $menu_item->id }}">{{ $menu_item->name }}</a>
        @endforeach
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="menus" data-section="menu">
                    @for($i = 0; $i < count($dish); $i += 2)
                        <?php
                        $el = $dish[$i];
                        ?>
                        <li data-cat="{{ $el->menu_item->id }}">
                            <figure class="image"><img src="{{ asset("storage/dish_images/".$el->image_url)  }}">
                                <p class="text-center" style="color: #FFA33E; font-size: 17px">{{ $el->price }} ₽</p>
                            </figure>
                            <div class="text">
                                <h3>{{ $el->name }}</h3>
                                <p style="margin-bottom: 0">{{ $el->description }}</p>
                                <h4 class="quantity hidden" style="margin: 0">
                                    <button class="btn btn-danger" style="border-radius: 0; padding: 10px 15px 10px 15px" onclick="minus({{ $el->id }})">-</button>
                                    <span id="count_{{ $el->id }}">0</span>
                                    <button class="btn btn-success" style="border-radius: 0; padding: 10px 15px 10px 15px" onclick="plus({{ $el->id }})">+</button>
                                    <input type="hidden" id="{{ $el->id }}" name="quantity" value="0">
                                </h4>
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
                            <figure class="image"><img src="{{ asset("storage/dish_images/".$el->image_url)  }}">
                                <p class="text-center" style="color: #FFA33E; font-size: 17px">{{ $el->price }} ₽</p>
                            </figure>
                            <div class="text">
                                <h3>{{ $el->name }}</h3>
                                <p style="margin-bottom: 0">{{ $el->description }}</p>
                                <h4 class="quantity hidden" style="margin: 0">
                                    <button class="btn btn-danger" style="border-radius: 0; padding: 10px 15px 10px 15px" onclick="minus({{ $el->id }})">-</button>
                                    <span id="count_{{ $el->id }}">0</span>
                                    <button class="btn btn-success" style="border-radius: 0; padding: 10px 15px 10px 15px" onclick="plus({{ $el->id }})">+</button>
                                    <input type="hidden" id="{{ $el->id }}" name="quantity" value="0">
                                </h4>
                            </div>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</section>

@push("scripts")
    <script type="text/javascript">

        function plus(id) {
            let el = document.getElementById("count_" + id);
            let input = document.getElementById(id);
            el.innerText = parseInt(el.innerText) + 1 < 50 ? parseInt(el.innerText) + 1 : el.innerText;
            input.value = el.innerText;
        }

        function minus(id) {
            let el = document.getElementById("count_" + id);
            let input = document.getElementById(id);
            el.innerText = parseInt(el.innerText) - 1 >= 0 ? parseInt(el.innerText) - 1 : el.innerText;
            input.value = el.innerText;
        }

    </script>
@endpush
