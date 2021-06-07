<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Русская трапеза</title>
    <meta name="description" content="Русская трапеза кафе">

    <meta name="keywords" content="кафе Москва, перекусить в Москве, кафе, где покушать в Москве, ближайшая еда">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/styles-merged.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <script src="{{ asset("js/vendor/jquery.min.js") }}"></script>
<script src="{{ asset("js/vendor/html5shiv.min.js") }}"></script>
<script src="{{ asset("js/vendor/respond.min.js") }}"></script>
<script src="{{ asset("js/filter.js") }}"></script>
</head>
<body>



@yield("body")


@stack("scripts")

</body>
</html>
