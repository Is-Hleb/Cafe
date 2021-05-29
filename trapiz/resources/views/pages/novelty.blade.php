<?php
$promotion_dish = $novelty["promotion_dish"];
?>
<section class="probootstrap-section" data-section="novelty">
    <div class="container">
        <div class="row">
            <div class="probootstrap-cell-retro">
                <div class="half">
                    @for($i = 0; $i < $promotion_dish->count(); $i += 2)
                        <?php $el = $promotion_dish[$i] ?>
                        <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn"
                             data-section="free">
                            <div class="image"
                                 style="background-image: url({{ asset("storage/dish_images/".$el->image_url) }});"></div>
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
                        <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn"
                             data-section="free">
                            <div class="image"
                                 style="background-image: url({{ asset("storage/dish_images/".$el->image_url) }});"></div>
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
