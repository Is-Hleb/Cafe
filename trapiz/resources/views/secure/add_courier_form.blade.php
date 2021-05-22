@extends("secure.layout")

@section("content")

    <div class="col-md-12 text-center">
        <div class="probootstrap-heading">
            <h2 class="primary-heading">Adding a courier</h2>
        </div>
        <section class="probootstrap-section">
            <div class="container mt5">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route("admin.post_add_courier") }}" class="probootstrap-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">ФИО курьера</label>
                                        <div class="form-field">
                                            <i class="icon icon-user2"></i>
                                            <input name="name" type="text" id="name" class="form-control" placeholder="Введите полное ФИО курьера">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <div class="form-field">
                                            <i class="icon icon-email"></i>
                                            <input name="email" type="text" id="email" class="form-control" placeholder="Введите e-mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Пароль</label>
                                        <div class="form-field">
                                            <i class="icon"><img src="img/icon_password.png" width="14" height="16"></i>
                                            <input name="password" type="password" id="phone" class="form-control" placeholder="Введите пароль">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <input type="submit" id="submit" value="Добавить курьера" class="btn btn-lg btn-primary btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
