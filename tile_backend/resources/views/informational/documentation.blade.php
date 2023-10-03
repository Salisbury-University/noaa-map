@extends('layouts.app')

@section('content')
<style>
@media only screen and (min-width: 900px) {
  .text-muted{width:25%;}
  .list-group-item{display:flex;}
}
</style>
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
                                
                                <li class="list-group-item  justify-content-between">
                                    <div class="fs-5">bathmap.net/api/welcome</div>
                                    <div class='text-muted '> Get a hello message from our team</div>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    <div class="fs-5">bathmap.net/api/version</div>
                                    <div class='text-muted '> Get the current version of the API </div>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    <div class="fs-5">{{"bathmap.net/api/relative/{z}/{x}/{y}"}}</div>
                                    <div class='text-muted '> Get a map tile by relative grid position with x as column, y as row and z as the zoom level </div>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    <div class="fs-5">{{"bathmap.net/api/relative/{gridID}/{z}/{x}/{y}"}}</div>
                                    <div class='text-muted '> Get a map tiles by relative grid position only from a specific region.</div>
                                  
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
                                                    <th scope="col">Grid ID</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <th scope="row">Vermont</th>
                                                    <td>01a</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Maine</th>
                                                    <td>01</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">New York State</th>
                                                    <td colspan="2">02a</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Boston</th>
                                                    <td colspan="2">02b</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">New York City</th>
                                                    <td colspan="2">03</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Eastern Maryland</th>
                                                    <td colspan="2">04</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Virginia</th>
                                                    <td colspan="2">05</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Kitty Hawk</th>
                                                    <td colspan="2">06</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Charlotte</th>
                                                    <td colspan="2">07</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Myrtle Beach</th>
                                                    <td colspan="2">08</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Jacksonville</th>
                                                    <td colspan="2">09</td>
                                                  </tr>                                        
                                                  <tr>
                                                    <th scope="row">Bahamas</th>
                                                    <td colspan="2">10</td>
                                                  </tr>                                       
                                                   <tr>
                                                    <th scope="row">Dominican Republic</th>
                                                    <td colspan="2">11</td>
                                                  </tr>                                       
                                                    <tr>
                                                    <th scope="row">Cancun</th>
                                                    <td colspan="2">12</td>
                                                  </tr>                                        
                                                  <tr>
                                                    <th scope="row">West Florida</th>
                                                    <td colspan="2">13</td>
                                                  </tr>                                        
                                                  <tr>
                                                    <th scope="row">New Orleans</th>
                                                    <td colspan="2">14</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Gulf of Mexico</th>
                                                    <td colspan="2">15</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Lake Erie</th>
                                                    <td colspan="2">16</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Lake Michiagan</th>
                                                    <td colspan="2">17</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Lake Superior</th>
                                                    <td colspan="2">18</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Lake Huron</th>
                                                    <td colspan="2">19</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">California</th>
                                                    <td colspan="2">20</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Washington State</th>
                                                    <td colspan="2">21</td>
                                                  </tr>
                                                  <tr>
                                                    <th scope="row">Western Canada</th>
                                                    <td colspan="2">22</td>
                                                  </tr>                                    
                                                 <tr>
                                                    <th scope="row">Gulf of Alaska</th>
                                                    <td colspan="2">23</td>
                                                  </tr>
                                                </tr>                                     
                                                <tr>
                                                    <th scope="row">Beaufort Sea</th>
                                                    <td colspan="2">24</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Bering Sea</th>
                                                    <td colspan="2">25</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">North Pacific Ocean</th>
                                                    <td colspan="2">26</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Anchorage</th>
                                                    <td colspan="2">27</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Hawaii</th>
                                                    <td colspan="2">28</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">East China Sea</th>
                                                    <td colspan="2">29</td>
                                                </tr>
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