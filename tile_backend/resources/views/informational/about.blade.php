@extends('layouts.app')

@section('content')
<style>
@media only screen and (min-width: 767px) {
    
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
                <div class="card-header">{{ __('About') }}</div>

                <div class="card-body">                    
                    <div class="m-3">
                    <h2 class="card-subtitle mb-2 text-muted">Our Purpose</h6>
                    <p>
                        The oceans are some of the last unexplored places of the world. Despite having been sailed for centuries, only a tiny fraction of the ocean floor has been mapped. We are creating this public API for the purpose of making NOAA's bathymetric (ocean depth) map data easliy acessible for developers and the 
                        public. This project is being done for credit for a software engineering class. We are working in collaberation with Sophie Wang 
                        and Aurthur Lembo who are both professors at Salisbury University. 
                    </p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <iframe class="m-3"width="420" height="315"
                            src="https://www.youtube.com/embed/ftHomiQRhMA">
                        </iframe> 
                    </div>
                    
                    <div class="m-3">
                        <h2 class="card-subtitle mb-2 text-muted">Team Members</h2>
                        <div class="card" >
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item  justify-content-between">
                                    <div>John Meyers, Team Leader and Frontend Engineer</div>
                                    <div class='text-muted'> jmeyers5@gulls.salisbury.edu</div>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    <div>Bryan Yoder, Frontend Engineer</div>
                                    <div class='text-muted'> byoder1@gulls.salisbury.edu</div>
                                </li>
                                <li class="list-group-item justify-content-between">
                                    <div>Brian Bowers, Database Engineer</div>
                                    <div class="text-muted">bbowers4@gulls.salisbury.edu</div>
                                </li>
                                <li class="list-group-item  justify-content-between">
                                    <div>Mark Schweitzer, Database Engineer</div>
                                    <div class="text-muted">mschweitzer1@gulls.salisbury.edu</div>
                                </li>
                                <li class="list-group-item  justify-content-between">
                                    <div>Isaac Dugan, Backend Engineer</div>
                                    <div class="text-muted">idugan1@salisbury.edu</div>
                                </li>
                                <li class="list-group-item  justify-content-between">
                                    <div>Sophie Wang, Project Consultant and Salisbury University Professor</div>
                                    <div class="text-muted">xswang@salisbury.edu</div>
                                </li>
                                <li class="list-group-item  justify-content-between">
                                    <div>Authur Lembo, GIS Consultant and Salisbury University Professor</div>
                                    <div class="text-muted">ajlembo@salisbury.edu</div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection