<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>@yield('title', 'Messy Presents')</title>
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @yield('head')
    </head>
    <body class="font-sans">
        
        <div id="app" class="container mx-auto p-1 sm:p-8">
            @yield('content')
        </div>

        @stack('scripts')
        
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
