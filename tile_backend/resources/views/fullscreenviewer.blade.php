<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BathMap') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script>
        window.appConfig = {
            appUrl: @json(env('APP_URL')),
            olKey: @json(env('OL_KEY')),

        };
    </script>
    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
</head>
<body>
    
    <select name="gridID" id="grid_selector" hidden>
    <option value="" selected >All Locations</option>
    </select>

    <span  class="d-flex justify-content-center">
      <div id="map" class="map" style="height: 100vh; width:100vw;"></div>   
    </span>



</body>
</html>

