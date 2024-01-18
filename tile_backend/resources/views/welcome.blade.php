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

            <div class="container">
                <div class="slideshow-container">

                <div class="mySlides fade">
                  <a a href="https://github.com/Salisbury-University/noaa-map">
                    <img src="./openSourceSea.jpg" style="width:100%;height:15em">
                  </a>
                  <div class="text2 text-black"><strong>Open source like the seas</strong></div>
                </div>

                <div class="mySlides fade">
                  <a a href="{{ url('/about') }}">
                    <img src="./teamPhoto426.JPG" alt="team photo"style="width:100%;height:15em">
                  </a>
                  <div class="text text-black "><strong>Our team</strong></div>
                </div>

                <div class="mySlides fade">
                  <a a href="{{ url('/viewer') }}">
                    <img src="./mapViewerScreen1.png" alt="viewer photo"style="width:100%;height:15em">
                  </a>
                  <div class="text3 text-black"><strong>The maps</strong></div>
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


                </div>

                <div class = "container" >
                    <div class = "row py-2">
                        <div class="d-grid gap-2">
                            <a href="/viewer" class="btn btn-primary btn-rounded btn-block" role="button">
                                <h1 class="display-4">See the maps</h1>
                                <p class="lead">Take a first-hand look at the bathymetric data with our interactive map viewer built on OpenLayers.</p>
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
                                <p class="lead">The BathMap API has wonderful documentation covering every aspect of our product. Useful for someone brand new or experienced!</p>
                            </a>
                        </div>  
                    </div>
                    <div class = "row py-2">
                        <div class="col-sm-6">
                            <a href="/about" class="btn btn-primary btn-rounded" role="button">
                                <h1 class="display-4">About</h1>
                                <p class="lead">Learn more about the team behind this project! Learn more about bathymetric mapping and the world's oceans!</p>
                            </a>
                        </div>  
                        <div class="col-sm-6">
                            <a href="https://github.com/Salisbury-University/noaa-map" class="btn btn-primary btn-rounded" target="_blank" role="button">
                                <h1 class="display-4">Open Source</h1>
                                <p class="lead">At BathMap we belive in free and open-source software! You can find us on github by clicking here!</p>
                            </a>
                        </div>  
                    </div>

                </div>
                </div>
            </div>
        </div>
    </body>
</html>
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
@endsection
