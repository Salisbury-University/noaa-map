@extends('layouts.app')

@section('content')
      <a href="https://www.bathmap.net/" class="d-flex justify-content-center">
        <img src="{{asset("./logo.png")}}" alt="Logo" style="width:20em;height:20em;float:right" >
      </a>
      <div class="d-flex justify-content-center">
          <select name="gridID" id="grid_selector">
            <option value="" selected >All Locations</option>
            <option value="01a/">Vermont (01a)</option>
            <option value="01b/">Maine (01b)</option>
            <option value="02a/">New York State (02a)</option>
            <option value="02b/">Boston (02b)</option>
            <option value="03/">New York City (03)</option>
            <option value="04/">Eastern Maryland (04)</option>
            <option value="05/">Virginia (05)</option>
            <option value="06/" >Kitty Hawk (06)</option>
            <option value="07/">Charlotte (07)</option>
            <option value="08/">Mrytle Beach (08)</option>
            <option value="09/">Jacksonville (09)</option>
            <option value="10/">Bahamas (10)</option>
            <option value="11/">Dominican Republic (11)</option>
            <option value="12/">Cancun (12)</option>
            <option value="13/">West Florida (13)</option>
            <option value="14/"> New Orleans (14)</option>
            <option value="15/"> Gulf of Mexico (15)</option>
            <option value="16/">Lake Erie (16)</option>
            <option value="17/">Lake Michigan (17)</option>
            <option value="18/">Lake Superior (18)</option>
            <option value="19/">Lake Huron (19)</option>
            <option value="20/">California (20)</option>
            <option value="21/">Washington State (21)</option>
            <option value="22/">Western Canada (22)</option>
            <option value="23/">Gulf of Alaska (23)</option>
            <option value="24/">Beaufort Sea (24)</option>
            <option value="25/">Bering Sea (25)</option>
            <option value="26/">North Pacific Ocean (26)</option>
            <option value="27/">Anchorage (27)</option>
            <option value="28/">Hawaii (28)</option>
            <option value="29/">East China Sea (29) </option>
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

