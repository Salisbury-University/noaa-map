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
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                      </ul>
                    
                   
    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
