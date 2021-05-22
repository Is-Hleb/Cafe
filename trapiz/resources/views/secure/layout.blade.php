@extends("main_layout")

@section("body")

    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-link"><a href="{{ route("admin.index") }}">Главная</a></li>
                @if(Auth::user()->role == "main_admin")
                    <li class="navbar-link"><a href="{{ route("admin.cafe") }}">Кофейни</a></li>
                @endif
                @if(Auth::user()->role == "admin")
                    <li class="navbar-link"><a href="{{ route("admin.add_courier") }}">Курьеры</a></li>
                @endif
                <li class="navbar-link"><a href="{{ route("admin.logout") }}">Выйти</a></li>
            </ul>
        </div>
    </nav>

    <div class="mt-5 text-center">
        @yield("content")
    </div>
@endsection
