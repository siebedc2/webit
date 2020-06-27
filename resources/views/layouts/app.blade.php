<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @if(View::hasSection('meta'))
        @yield('meta')
    @else
        <title>@lang('meta.'.Route::current()->getName())</title>
    @endif


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @yield('extra-js')
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    @yield('extra-css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    @yield('content')

</body>
</html>
