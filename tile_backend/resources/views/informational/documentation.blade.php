@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="{{asset("./logo.svg")}}" class =" w-75 justify-content-center"alt="">
            <div class="card">
                <div class="card-header">{{ __('Documentation') }}</div>
                <div class="card-body">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis animi ipsa quia molestias ut repellendus hic vitae nesciunt nam, voluptatum laboriosam corporis, adipisci necessitatibus perferendis architecto dolores! Blanditiis, odio officia?</p>
                    
                   
    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection