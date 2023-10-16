@extends('layouts.app')

@section('content')
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
    
   <div>

   <span  class=" mb-4 d-flex justify-content-center">
      <div id="map" class="map  container " style="height: 75vh;"></div>
      <a a href="{{ url('/') }}">
   <img class = "absWater" src="{{asset("./bathMapLogoNoBackGround.png")}}" alt="Logo"  role = "button"> 
</a> 
    </span>
    </div>

<style>

  .absWater {
    position: absolute;
    top: 85%;
    left: 7.5%;
    width: 9em;
    height: 8em;
    z-index: 1;
    opacity: 0.2;
    display: flex;
  }

  /* On smaller screens, decrease text size */
@media only screen and (max-width: 600px) {
  .absWater {
    left: 3%;
  }
}
</style>

@endsection

