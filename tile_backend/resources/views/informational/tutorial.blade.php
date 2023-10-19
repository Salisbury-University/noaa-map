@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center m-2">
                <img src="{{asset("./logo.png")}}" class =" w-25 "alt="">
            </div>
            <div class="card">
                <div class="card-header">{{ __('Tutorial') }}</div>
                <div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            Log into www.bathmap.net or create an account if you don't already have one.
        </li>
        <li class="list-group-item"> 
            Navigate to the My Tokens page and click the green New Token button. Your token will be shown to you at the top of page in a 
            green banner. Put this is a safe place because once you log out, you won't be able to see the token again. 
        </li>
        <li class="list-group-item"> 

            <div>Making a request with javascript:</div>
            <div id ="code">
            <pre><code>
        const options = {
            method: 'GET',
            headers: {
                Accept: 'application/json',
                Authorization: 'Bearer <strong>YOUR_TOKEN_HERE</strong>'
            }
            };
            
            fetch('https://www.bathmap.net/api/welcome', options)
            .then(response => response.json())
            .then(response => console.log(response))
            .catch(err => console.error(err));
            </code></pre> 
            </div>
        </li>
        <li class="list-group-item">
            <div>Making a request with curl:</div>
            <div id ="code1">
            <pre><code>
        curl --request GET \
        --url https://www.bathmap.net/api/welcome \
        --header 'Accept: application/json' \
        --header 'Authorization: Bearer <strong>YOUR_TOKEN_HERE</strong>'
            </code></pre>
                </div>
        </li>
        <li class="list-group-item">
            <div>Making a request with python</div>
            <div id ="code2">
            <pre><code>
        import requests

        url = "https://www.bathmap.net/api/welcome"

        payload = ""
        headers = {
            "Accept": "application/json",
            "Authorization": "Bearer YOUR_TOKEN_HERE"
        }

        response = requests.request("GET", url, data=payload, headers=headers)

                                        print(response.text)
            </code></pre>
            </div>
        </li>
        <li class="list-group-item">
            You should get a message that says "Hello BathMap User!" Now that you know how to make a request, head over to our 
            <a href="{{route("documentation")}}" class="text-muted">documentation</a> to discover all the ways you can use the Bathymetric API.
        </li>
        <li class="list-group-item">
            <div>Another way you can use these maps in you application is to embed it using an iframe as shown below:</div>
            <div id ="code3">
            <pre><code>
                                
        {{'<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>

            </head>
            <body>
                <div>
                    <iframe 
                        src="'. env("APP_URL") .'/fullscreenviewer" 
                        frameborder="0" 
                        height="100px" 
                        width="100px">
                    </iframe>
                </div>
            </body>
        </html>'}}
        </code></pre>
        </div>
        </li>
    
    </ul>
                    
                   
    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
