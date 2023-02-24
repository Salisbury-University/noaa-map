@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="{{asset("./logo.svg")}}" class =" w-75 justify-content-center"alt="">
            <div class="card">
                <div class="card-header">{{ __('Tutorial') }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Log in to Bathymetric API or create an account if you don't already have one.
                        </li>
                        <li class="list-group-item"> 
                            Navigate to the My Tokens page and click the green New Token button. 
                        </li>
                        <li class="list-group-item"> 
                            Make a request with javascript
                        </li>
                        <li class="list-group-item">
                            Make a request with curl
                        </li>
                        <li class="list-group-item">
                            Make a request with python
                        </li>
                      </ul>
                    
                   
    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
