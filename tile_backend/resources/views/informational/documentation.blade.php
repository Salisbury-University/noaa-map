@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img src="{{asset("./logo.svg")}}" class =" w-75 justify-content-center"alt="">
            <div class="card">
                <div class="card-header">{{ __('Documentation') }}</div>
                <div class="card-body">
                    <h2 class="card-subtitle mb-2 text-muted">Routes</h2>
                    <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">BathMap.net/api/welcome</div>
                                    <div class='text-muted w-25'> Get a hello message from our team</div>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">BathMap.net/api/version</div>
                                    <div class='text-muted w-25'> Get the current version of the API </div>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">{{"BathMap.net/api/relative/{x}/{y}/{z}"}}</div>
                                    <div class='text-muted w-25'> Get a map tile by relative grid position with x as column, y as row and z as the zoom level </div>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">{{"BathMap.net/api/coordinate/{lattitude}/{longitude}/{scope}"}}</div>
                                    <div class='text-muted w-25'> Get a map tile by the lattitude and longitude of the top right corner of the tile and the scope/width of the tile in miles </div>
                                </li>
                                
                                

                            </ul>
                    
                   
    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection