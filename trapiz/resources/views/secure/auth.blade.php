@extends("main_layout")

@section("body")

    <div class="col-md-12 text-center ">
        <div class="probootstrap-heading">
            <h3 class="primary-heading">Authorization</h3>
        </div>
        <section class="probootstrap-section">
            <div class="container mt5">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route("doLogin") }}" class="probootstrap-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <div class="form-field">
                                            <i class="icon icon-email"></i>
                                            <input name="email" type="text" class="form-control" placeholder="Введите e-mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Пароль</label>
                                        <div class="form-field">
                                            <i class="icon"><img src="img/icon_password.png" width="14" height="16"></i>
                                            <input name="password" type="password" class="form-control" placeholder="Введите пароль">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <input type="submit" id="submit" value="Войти" class="btn btn-lg btn-primary btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
