<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOBCARGO</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset("assets/bootstrap-icons/font/bootstrap-icons.min.css")}}">
    @yield('css')
</head>
<body>
@include("layouts.front.header")
@yield("content")
@include("layouts.front.footer")
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
@yield('js')
</body>
</html>
