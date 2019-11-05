<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (!Auth::guest())
        <meta name="api-token" content="{{Auth::user()->api_token}}">
    @endif
    <title>RealEstateDoc Framework</title>
    {{--    @include('partials.vendor-bundle')--}}
<!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Styles -->

{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    @stack('scripts')
    @stack('styles')
    @include('partials.ga')

</head>
<body class="@yield('body_class')">
<div id="app"></div>
{{--Scripts--}}
<script src="{{ mix('js/backoffice/backoffice.vuetify.js') }}" defer></script>
@yield('scripts')

{{--Styles--}}
@yield('styles')
<link href="{{ mix('css/backoffice/backoffice.css') }}" rel="stylesheet">
</body>
</html>
