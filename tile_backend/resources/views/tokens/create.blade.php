@extends('layouts.app')

@section('content')

<div class="container">
    

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center m-2">
                <img src="{{asset("./logo.png")}}" class =" w-50 "alt="">
            </div>            <div class="card">
                <div class="card-header">{{ __('Create Token') }}</div>
                <div class="card-body">
                   
                    
                    <form action="{{route("tokens.store")}}" method="POST" class="form-group">
                        @csrf
                        <div class="form-group">
                            <label for="token_name">Token Name</label>
                            <input type="text" name="token_name" class="form-control" id="token_name"  >
                        </div>
                        <a href="/home"class="m-3 btn btn-sm btn-dark" >Cancel</a>
                        <button type="submit" class="m-3 btn btn-sm" style="background-color: rgb(0, 47, 130); color:white;">Create</button>
                    </form>

                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection