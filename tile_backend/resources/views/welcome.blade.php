@extends('layouts.app')


@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bathymetric Tile API</title>

        <!-- Fonts -->
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
        <script type="text/javascript" src="css3-mediaqueries.js"></script>
        

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
                <style>
* {box-sizing: border-box}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 300px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
    -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  -webkit-animation-fill-mode: forwards; 
  animation-name: fade;
  animation-duration: 1.5s;
  animation-fill-mode: forwards; 
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 767px) {
  .prev, .next,.text {font-size: 11px}
  .slideshow-container {max-width: 225px;}
  .dot{height: 10px;
  width:10px;}
}

</style>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="./logo.png" style="width:100%">
  <div class="text text-black">Open source like the seas</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="" alt="team photo"style="width:100%">
  <div class="text text-black">Our team</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="" alt="viewer photo"style="width:100%">
  <div class="text text-black">The maps</div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = "dot";
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</div>

<style>
.btn-primary, .btn-primary:active, .btn-primary:visited {
    background-color: #f7f7f7 !important;
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    border-color: #f7f7f7;
    @media (max-width: 100px){
      background-color: black;
    }
}

.btn-primary:hover {
    box-shadow: 6px 6px 10px rgba(0, 0, 0, 0.2);
    border-color: #f7f7f7;
}

h1{
    color: #005eae;
}

p{
    color: #1aa7d8;
}
@media screen and (max-width: 767px){
  .col-sm-6{padding: 2px}
  .btn-primary{
    height: 100px;
    
  }
  .lead{font-size: small;}
  .display-4{font-size: medium;}
}

</style>
<!-- Container for the homepage buttons -->
                <div class = "container" >
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