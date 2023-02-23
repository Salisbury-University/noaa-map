@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))

        <div class="card">
            <div class="card-header">Token Created</div>
            <div class="card-body">
                <div class="alert ">
                    This is your API key, please put this in a safe place as you will not be able to view it once you logout or create another token.
                </div>
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                </div>
        </div>
        @endif


    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="{{asset("./logo.svg")}}" class =" w-75 justify-content-center"alt="">
            <div class="card">
                <div class="card-header">{{ __('My Tokens') }}</div>
                <div class="card-body">
                    <a href="{{route("tokens.create")}}" class="m-3 btn " style="background-color: #009688; color:white;">New Token</a>
                    
                    <table class=" m-3 table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created</th>
                            <th scope="col">Last Used</th>
                            <th scope="col">Number of Uses</th>
                            <th scope="col">Actions</th>


                          </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->tokens as $token)
                            <tr>
                                <th scope="row">{{$token->id}}</th>
                                <td>{{$token->name}}</td>
                                <td>{{$token->created_at}}</td>
                                <td>{{$token->last_used_at}}</td>
                                <td>{{$token->uses}}</td>
                                <td>
                                    <form method="POST" action="{{route("tokens.destroy",$token->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                          
                        </tbody>
                      </table>

                </div>
                
            </div>
        </div>
    </div>

</div>


@endsection
