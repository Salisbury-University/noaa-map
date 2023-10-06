@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-center m-2">
                <img src="{{asset("./logo.png")}}" class =" w-25 "alt="">
            </div>
            <div class="card">
                <div class="card-header">{{ __('Documentation') }}</div>
                <div class="card-body">
                    <h2 class="card-subtitle mb-2 text-muted">Routes</h2>
                    <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">bathmap.net/api/welcome</div>
                                    <div class='text-muted w-25'> Get a hello message from our team</div>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">bathmap.net/api/version</div>
                                    <div class='text-muted w-25'> Get the current version of the API </div>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">{{"bathmap.net/api/relative/{z}/{x}/{y}"}}</div>
                                    <div class='text-muted w-25'> Get a map tile by relative grid position with x as column, y as row and z as the zoom level </div>
                                </li>
                                <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">{{"bathmap.net/api/relative/{gridID}/{z}/{x}/{y}"}}</div>
                                    <div class='text-muted w-25'> Get a map tiles by relative grid position only from a specific region.</div>
                                  
                                </li>
                                <div class="accordion list-group-item " id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Region Grid ID Lookup Table
                                          </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                          <div class="accordion-body">
                                            <table class="table">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Region</th>
                                                    <th >Grid ID</th>
                                                    <th> Grid Center</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($grids as $grid)
                                                    <tr>
                                                      <th scope="row">{{$grid->name}}</th>
                                                      <td>{{$grid->gridID}}</td>
                                                      <td>{{$grid->gridCenter}}</td>
                                                    </tr>
                                                  @endforeach
                                                </tbody>
                                              </table>
                                        </div>
                                        </div>
                                      </div>
                                </div>




                                {{-- we'll add this once the feature is working --}}
                                {{-- <li class="list-group-item  d-flex justify-content-between">
                                    <div class="fs-5">{{"bathmap.net/api/coordinate//{lattitude}/{longitude}/{scope}"}}</div>
                                    <div class='text-muted w-25'> Get a map tile by the lattitude and longitude of the top right corner of the tile and the scope/width of the tile in miles </div>
                                </li> --}}
                                
                                

                            </ul>
                    
                   
    
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection