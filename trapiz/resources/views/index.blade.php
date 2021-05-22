@extends("main_layout")

@push("scripts")
    <script src="{{ asset("js/scripts.min.js") }}" async></script>
    <script src="{{ asset("js/custom.min.js") }}" async></script>
@endpush

@section("body")

    @include("pages.header")
    @include("pages.novelty")
    @include("pages.menu")
    @include("pages.booking")
    @include("pages.promotion")
    @include("pages.feedback")
    @include("pages.contacts")

@endsection
