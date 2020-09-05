<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pokedex') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">

                <nav class="col-md-3 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('assets/logo.svg') }}" class="img-fluid" alt="Pokemon logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="" id="navbarSupportedContent">      
                            @include('bricks.sidemenu')
                        </div>
                    </div>
                </nav>
        
                <main role="main" class="col-md-9 ml-sm-auto col-lg-9">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
