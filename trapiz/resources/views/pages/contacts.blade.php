<?php
$restaurants = $contacts["restaurants"];
?>
<section class="probootstrap-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="probootstrap-footer-widget">
                    <h3>Местоположение</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                @if(!empty($restaurants))
                                    @foreach($restaurants as $restaurant)
                                        {{ $restaurant->address }}<br>
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ">
                <div class="probootstrap-footer-widget">
                    <h3>Рабочий график</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <p>ПН-ПТ <br> 09:00 - 20:00 </p>
                        </div>
                        <div class="col-md-4">
                            <p>СБ-ВС <br>10:00 - 21:00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="probootstrap-footer-widget">
                    <h3>Для личной связи:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                @if(!empty($restaurants))
                                    @foreach($restaurants as $restaurant)
                                        {{ $restaurant->phone }},<br>
                                        {{ $restaurant->admin->email }}<br><br>
                                    @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="probootstrap-copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class="copyright-text">&copy; 2021 Все права защищены</p>
            </div>
        </div>
    </div>
</section>
