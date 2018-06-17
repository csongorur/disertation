<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}" />

        <!-- Scripts -->
        <script type="text/javascript" src="{{ mix('js/app.js') }}" ></script>
    </head>
    <body>
        @include ('pages.components.header')
        <div class="content-container">
            @yield ('content')
        </div>
        @include ('pages.components.alerts')
        @include ('pages.components.footer')
        @stack ('content-scripts')
    </body>
</html>
