<?php

namespace App\Http\Controllers;

use App\Models\Tile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateTileRequest;

class TileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTileRequest $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tile $tile): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tile $tile): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTileRequest $request, Tile $tile): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tile $tile): RedirectResponse
    {
        //
    }

    public function coordinate($lattitude, $longitude, $scope){
        return([
            "message"=>"Tile at " . $lattitude . ", ". $longitude . " with a width of " . $scope
        ]);
    }

    public function relative($z, $x, $y){

        $location=DB::connection('sqlite_tiles')->table("location")->where("map_z",$z)->where('map_row',$x)->where("map_col",$y)->first();
        if(isset($location)){
            $tile=DB::connection("sqlite_tiles")->table("tile")->where("id",$location->tile_ID)->first();
            return response($tile->image, 200)->header('Content-Type', 'image/png');
        }
        else{
            return ["message"=>"no tile with that location"];
        }
        
    }
}
