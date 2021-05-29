@php

    $promotions = $promotion['promotions'];

@endphp

@if(!empty($promotions))

    <section style="background-image: url({{ asset("img/hero_bg_4.jpg") }});" data-stellar-background-ratio="0.5"
             data-section="events">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center ">
                    <div class="probootstrap-heading">
                        <h2 class="primary-heading">Promotion</h2>
                        <h3 class="secondary-heading">Акции</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="probootstrap-section">
        <div class="container">
            <div class="row">
                @foreach($promotions as $promotion)
                    <div class="col-md-4 col-sm-4">
                        <div class="probootstrap-block-image">
                            <figure><img src="{{ asset("storage/promotion_images/".$promotion->image_url) }}"
                                         data-section="action"></figure>
                            <div class="text">
                                <span class="date">{{ $promotion->created_at }}</span>
                                <h3><a href="#">{{ $promotion->name }}</a></h3>
                                <p>{{ $promotion->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
