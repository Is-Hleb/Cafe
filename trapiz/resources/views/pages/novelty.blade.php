<?php
$promotion_dish = $novelty["promotion_dish"];
?>
<section style="background-image: url(img/hero_bg_4.jpg);" data-section="novelty" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center probootstrap-animate">
                <div class="probootstrap-heading">
                    <h2 class="primary-heading"   >Novelty</h2>
                    <h3 class="secondary-heading">Новинки</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="probootstrap-section" style="padding-bottom: 140px; margin-top: 47px" >
    <div class="container">
        <div class="row">
            <div class="probootstrap-cell-retro">
                <div class="half">
                    @for($i = 0; $i < $promotion_dish->count(); $i += 2)
                        <?php $el = $promotion_dish[$i] ?>
                        <div class="probootstrap-cell probootstrap-animate {{ ($i / 2) % 2 ? "reverse" : "" }}" data-animate-effect="fadeIn"
                             data-section="free">
<img style="
    height: 300px;" src="{{ asset("storage/dish_images/".$el->image_url) }}" alt="" class="image">
                            <div class="text text-center">
                                <h3>{{$el->name}}</h3>
                                <p>{{$el->description}}</p>
                                <p class="price">{{ $el->price }} ₽</p>
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="half">
                    @for($i = 1; $i < $promotion_dish->count(); $i += 2)
                        <?php $el = $promotion_dish[$i] ?>
                        <div class="probootstrap-cell probootstrap-animate {{ ($i / 2) % 2 ? "reverse" : "" }}" data-animate-effect="fadeIn"
                             data-section="free">
<img style="
    height: 300px;" src="{{ asset("storage/dish_images/".$el->image_url) }}" alt="" class="image">
                            <div class="text text-center">
                                <h3>{{$el->name}}</h3>
                                <p>{{$el->description}}</p>
                                <p class="price">{{ $el->price }} ₽</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
