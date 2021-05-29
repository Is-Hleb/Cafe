@extends("main_layout")

@section("body")

    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-link"><a href="{{ route("admin.index") }}">Главная</a></li>
                @if(Auth::user()->role == "main_admin")
                    <li class="navbar-link"><a href="{{ route("admin.cafe") }}">Кофейни</a></li>
                    <li class="navbar-link"><a href="{{ route("admin.menu_item") }}">Пункты меню</a></li>
                    <li class="navbar-link"><a href="{{ route("admin.dish") }}">Меню</a></li>
                    <li class="navbar-link"><a href="{{ route("admin.feedback") }}">Отзывы</a></li>
                    <li class="navbar-link"><a href="{{ route("admin.promotion") }}">Аккции</a></li>
                @endif
                @if(Auth::user()->role == "admin")
                    <li class="navbar-link"><a href="{{ route("admin.add_courier") }}">Курьеры</a></li>
                @endif
                @if(Auth::user()->role == "courier")
                    <li class="navbar-link"><a href="{{ route("admin.booking") }}">Заказы</a></li>
                @endif
                <li class="navbar-link"><a href="{{ route("admin.logout") }}">Выйти</a></li>
            </ul>
        </div>
    </nav>

    <div class="mt-5 text-center">
        @yield("content")
    </div>
@endsection
