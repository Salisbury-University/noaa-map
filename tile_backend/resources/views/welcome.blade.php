@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bathymetric Tile API</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        

    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-blue-500 selection:text-white">
            {{-- @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-3 focus:rounded-sm focus:outline-blue-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            
            <div class="container">
                <div >
                    <img src="{{asset("./logo.png")}}" style="height:300px;"class =" border  rounded mx-auto d-block "alt="">
                </div>
                
                
                <div class = container>
                    <div class = "row py-2">
                        <div class="d-grid gap-2">
                            <a href="/viewer" class="btn btn-primary btn-rounded btn-block" role="button">
                                
                                <h1 class="display-4">See the maps</h1>
                                <p class="lead">Take a first hand look at the bathymetric data with our interactive map viewer built on OpenLayers.</p>
                            </a>
                        </div>        
                    </div>
                    <div class = "row py-2">
                        <div class="col-sm-6">
                            <a href="/tutorial" class="btn btn-primary btn-rounded" role="button">

                                <h1 class="display-4">Tutorials</h1>
                                <p class="lead">The BathMap API tutorials will guide you through the process of using these resources for yourself! </p>
                            </a>
                        </div>  
                        <div class="col-sm-6">
                            <a href="/documentation" class="btn btn-primary btn-rounded" role="button">
                                 
                                <h1 class="display-4">Documentation</h1>
                                <p class="lead">The BathMap API has wonderful documentation covering every aspect of our product. Useful for someone brand new or experianced!</p>
                            </a>
                        </div>  
                    </div>
                    <div class = "row py-2">
                        <div class="col-sm-6">
                            <a href="/about" class="btn btn-primary btn-rounded" role="button">

                                <h1 class="display-4">About</h1>
                                <p class="lead">Learn more about the team behind this project! Learn more about bathymetric mapping and the worlds oceans!</p>
                            </a>
                        </div>  
                        <div class="col-sm-6">
                            <a href="https://github.com/Salisbury-University/noaa-map" class="btn btn-primary btn-rounded" role="button">
                                 
                                <h1 class="display-4">Open Source</h1>
                                <p class="lead">At BathMap we belive in free and open source software! You can find us on github by clicking here!</p>
                            </a>
                        </div>  
                    </div>

                </div>
                
                
                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                           
                        </div>
                    </div>

                  
                </div>
            </div>
        </div>
    </body>
</html>

@endsection