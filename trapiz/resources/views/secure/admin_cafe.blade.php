@extends("secure.layout")

@section("content")

    <div class="col-md-12 text-center">
        <div class="probootstrap-heading">
            <h2 class="primary-heading">Adding a cafe</h2>
        </div>
        <section class="">
            <div class="container mt5">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route("admin.post_add_cafe") }}" class="probootstrap-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <div class="form-field">
                                            <i class="icon icon-email"></i>
                                            <input value="{{ old("email") }}" name="email" type="text" class="form-control"
                                                   placeholder="Введите e-mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Пароль</label>
                                        <div class="form-field">
                                            <i class="icon"><img src="img/icon_password.png" width="14" height="16"></i>
                                            <input value="{{ old("password") }}" name="password" type="password" class="form-control"
                                                   placeholder="Введите пароль">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">ФИО администратора</label>
                                        <div class="form-field">
                                            <i class="icon icon-user2"></i>
                                            <input value="{{ old("name") }}" name="name" type="text" id="name" class="form-control"
                                                   placeholder="Введите полное ФИО администратора">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Адрес</label>
                                        <div class="form-field">
                                            <i class="icon icon-address"></i>
                                            <input value="{{ old("address") }}" name="address" type="text" id="email" class="form-control"
                                                   placeholder="Введите адрес">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Телефон</label>
                                        <div class="form-field">
                                            <i class="icon icon-phone"></i>
                                            <input value="{{ old("phone") }}" name="phone" type="text" id="phone" class="form-control"
                                                   placeholder="Введите телефон">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <input type="submit" id="submit" value="Добавить кафе"
                                           class="btn btn-lg btn-primary btn-block">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($restaurants->count() > 0)
                <div style="overflow-x:auto;">
                    <div style="overflow-x:auto;">
                        <table>
                            <tr>
                                <th>ФИО администратора</th>
                                <th>E-mail</th>
                                <th>Адрес</th>
                                <th>Телефон</th>
                                <th>Удаление кафе</th>
                            </tr>
                            @foreach($restaurants as $restaurant)
                                <tr>
                                    <td>{{ $restaurant->admin->name }}</td>
                                    <td>{{ $restaurant->admin->email }}</td>
                                    <td>{{ $restaurant->address }} </td>
                                    <td>{{ $restaurant->phone }}</td>
                                    <td>
                                        <div class="col-md-9">
                                            <form method="post" action="{{ route("admin.post_delete_cafe") }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                                <input type="submit" name="submit" id="submit" value="Удалить"
                                                       class="btn btn-lg btn-primary btn-block">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            @endif
        </section>

@endsection
