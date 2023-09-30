@extends('layouts.app')

@section('content')
      <div class="d-flex justify-content-center">
        <img src="{{asset("./logo.png")}}" alt="Logo" style="width:15em;height:14em;float:right"  class="mt-2" >
      </div>
      <div class="d-flex justify-content-center">
          <select name="gridID" id="grid_selector">
                <option value="">All </option>
            @foreach ($grid_options as $option)
                 <option value="{{$option->gridID . "/"}}"> {{$option->name . ", (" . $option->gridCenter. ")"}}</option> 
            @endforeach
          </select>
      </div>
        <div class="d-flex justify-content-center">
          <div>
            <div id = "zoomLevel"></div>
            <div id = "tile-location"></div>
          </div>

        </div> 
    </div> 

    <span  class=" mb-4 d-flex justify-content-center">
      <div id="map" class="map  container " style="height: 50vh;"></div>   
    </span>



@endsection

