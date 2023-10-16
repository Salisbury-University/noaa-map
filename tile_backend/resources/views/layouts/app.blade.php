<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="app.css">
    
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
    <div id="app">
        
        <!-- Scripting for dark mode switcher -->    
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const darkModeToggle = document.getElementById('dark-mode-toggle');
            const element = document.body;
            
            // Function to toggle dark mode
            function toggleDarkMode() {
                element.classList.toggle("dark-mode");
                
                // Check if dark mode is enabled and save the preference in a cookie
                const isDarkModeEnabled = element.classList.contains("dark-mode");
                document.cookie = `dark_mode=${isDarkModeEnabled ? '1' : '0'}; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/`;
            }

            // Check the cookie to set the initial dark mode state
            const darkModeCookie = document.cookie.split(';').find(cookie => cookie.trim().startsWith('dark_mode='));
            if (darkModeCookie) {
                const isDarkModeEnabled = darkModeCookie.trim().split('=')[1] === '1';
                if (isDarkModeEnabled) {
                    element.classList.add("dark-mode");
                }
            }

            // Add a click event listener to the dark mode toggle
            darkModeToggle.addEventListener('click', toggleDarkMode);
        });
        </script>

        <!-- Dark mode styling 
        <style>
            .dark-mode {

                /* Background of page */
                background-color: #27374D;
                color: #9DB2BF;

                /* Welcome blade buttons */
                .btn-primary, .btn-primary:active, .btn-primary:visited {
                    background-color: #526D82 !important;
                    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
                    border-color: #526D82;
                }

                .btn-primary:hover {
                    box-shadow: 6px 6px 10px rgba(0, 0, 0, 0.2);
                    border-color: #526D82;
                }

                h1{
                    color: #9DB2BF;
                }

                p{
                    color: #DDE6ED;
                }
                
                /* For navbar at top of page */
                .navbar{
                    background-color : #526D82 !important;    
                }

                a{
                    color: #DDE6ED;
                }

                /*Informational pages */
                .card{
                    background-color : #526D82;
                }

                .list-group-item{
                    background-color : #526D81;
                    color: #DDE6ED;
                }

                .text-muted{
                    color: #9DB2BF !important;
                }

                .accordian{
                    background-color :#526D81 !important;
                }

            }
        </style>
-->
   

        <nav class="navbar navbar-expand-md nav-fill nav-pills navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-teal-500" href="{{ url('/') }}">
                   <!-- {{ config('app.name', 'Laravel') }}-->
                   <img src="{{asset("./logo.png")}}" width=50px height=50px background-size=150px>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a style="text-decoration-thickness: 3px;" class="nav-link" href="/viewer">Viewer</a></li>
                        <li class="nav-item"><a style="text-decoration-thickness: 3px;" class="nav-link" href="{{route("tutorial")}}">Tutorial</a></li>
                        <li class="nav-item"><a style="text-decoration-thickness: 3px;" class="nav-link" href="{{route("documentation")}}">Documentation</a></li>
                        <li class="nav-item"><a style="text-decoration-thickness: 3px;" class="nav-link" href="{{route("about")}}">About Us</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Dark Mode switcher -->
                        <li class="nav-item"><a id="dark-mode-toggle" class="nav-link" href="#">Dark Mode</a></li> 
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                                    <a class="dropdown-item " href="{{route("home")}}">
                                    {{ __('My Tokens') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">

                @yield('content')

        </main>
    </div>
</body>
</html>
