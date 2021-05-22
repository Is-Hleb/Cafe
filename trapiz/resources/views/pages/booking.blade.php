<section class="probootstrap-section probootstrap-bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 probootstrap-animate">
                <form action="{{ route("post_add_reservation") }}" method="post" class="probootstrap-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="people">Выберите город</label>
                                <div class="form-field">
                                    <i class="icon icon-chevron-down"></i>
                                    <select name="restaurant_id" id="people" class="form-control">
                                        @foreach($booking['restaurants'] as $restaurant)
                                            <option value="{{ $restaurant->id }}">{{ $restaurant->address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Адрес</label>
                                <div class="form-field">
                                    <i class="icon icon-address"></i>
                                    <input name="address" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END row -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Ваше имя</label>
                                <div class="form-field">
                                    <i class="icon icon-user2"></i>
                                    <input name="name" type="text" id="name" class="form-control" placeholder="Ваше полное имя">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="form-field">
                                    <i class="icon icon-mail"></i>
                                    <input name="email" type="text" id="email" class="form-control" placeholder="Ваш e-mail">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <div class="form-field">
                                    <i class="icon icon-phone"></i>
                                    <input name="phone" type="text" id="phone" class="form-control" placeholder="Ваш телефон">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" id="submit" value="Забронировать" class="btn btn-lg btn-primary btn-block">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
