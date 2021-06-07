<section style="background-image: url(img/hero_bg_5.jpg);" data-stellar-background-ratio="0.5"
         data-section="reservation">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center probootstrap-animate">
                <div class="probootstrap-heading">
                    <h2 class="primary-heading">Delivery</h2>
                    <h3 class="secondary-heading">Доставка</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="probootstrap-section probootstrap-bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form name="add_reservation" class="probootstrap-form">
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
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Ваше имя</label>
                                <div class="form-field">
                                    <i class="icon icon-user2"></i>
                                    <input name="name" type="text" id="name" class="form-control"
                                           placeholder="Ваше полное имя">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="form-field">
                                    <i class="icon icon-mail"></i>
                                    <input name="email" type="text" id="email" class="form-control"
                                           placeholder="Ваш e-mail">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone">Ваш телефон</label>
                                <div class="form-field">
                                    <i class="icon icon-mail"></i>
                                    <input name="phone" type="tel" id="phone" class="form-control"
                                           placeholder="Ваш телефон">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="selected_menu">Выберите блюда</label>
                                <div class="form-field">
                                    <button type="button" class="btn btn-lg btn-primary btn-block" type="button"
                                            id="select_menu">
                                        К меню
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <button class="btn btn-lg btn-primary btn-block" type="button" id="reservation_submit">
                                Заказать
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push("scripts")

    <script type="text/javascript" defer>
        let button = document.getElementById("reservation_submit");
        button.addEventListener('click', function () {
            let data = new FormData(document.forms.add_reservation);
            let quantity_inputs = document.getElementsByName("quantity");

            let quantity_array = [];

            for (let i = 0; i < quantity_inputs.length; i++) {
                let el = quantity_inputs[i];
                let value = el.value;
                let id = el.id;
                if (value != 0)
                    quantity_array.push({id: id, value: value});
            }

            data.append("selected_menu", JSON.stringify(quantity_array));

            for(let el of data.values())
            {
                console.log(el);
            }

            function post() {
                return new Promise(function (succeed, fail) {
                    let request = new XMLHttpRequest();
                    request.open("post", "{{ route("post_add_reservation") }}", true);
                    request.addEventListener("load", function () {
                        if (request.status < 400)
                            succeed(request.response);
                        else
                            fail(request.statusText);
                    });
                    request.send(data);
                });
            }

            post().then(function (text) {
                alert(text);
                document.getElementsByName("add_reservation")[0].reset();
            }, function (status_text) {
                console.log(status_text);
            }).finally(function () {
                let hidden_form = document.getElementsByClassName("quantity");
                for (let i = 0; i < hidden_form.length; i++) {
                    hidden_form[i].classList.add('hidden');
                }
            });
        });

        let select_menu_button = document.getElementById("select_menu");
        select_menu_button.addEventListener('click', function () {
            let hidden_form = document.getElementsByClassName("quantity");
            for (let i = 0; i < hidden_form.length; i++) {
                hidden_form[i].classList.remove('hidden');
            }
            let menu_nav = document.getElementById("menu_nav");
            let event = new Event("click");
            menu_nav.dispatchEvent(event);

        });

    </script>

@endpush
