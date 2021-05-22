@extends("secure.layout")

@section("content")

    <h3 class="text-center">Вы зашли как {{ Auth::user()->role }}</h3>

@endsection
