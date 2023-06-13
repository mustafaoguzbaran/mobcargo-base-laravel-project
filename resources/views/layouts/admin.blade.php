<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MOBCARGO Backoffice</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    @yield('css')
</head>
<body>
@include("layouts.admin.header")
@yield("content")
@include("layouts.admin.footer")
<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
@yield('js')
</body>
</html>
