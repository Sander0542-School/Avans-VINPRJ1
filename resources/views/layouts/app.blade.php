<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">

    <title>{{ isset($title) ? $title . ' - ' : null }}{{ config('app.name') }}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Kodular">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="kodular, store, android, apk, aia, ais, aix">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="shortcut icon" href="/favicon.ico"/>
</head>
<body>

@include('layouts.nav')

@yield('content')

<script src="{{ mix('js/app.js') }}"></script>

@stack('scripts')

</body>
</html>
