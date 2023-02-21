@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Tokens') }}</div>
                <div class="card-body">
                    <button class="m-3 btn btn-dark">New Token</button>
                    <table class=" m-3 table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->tokens as $token)
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
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
