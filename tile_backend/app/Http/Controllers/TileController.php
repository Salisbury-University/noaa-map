<?php

namespace App\Http\Controllers;

use App\Models\Tile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTileRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateTileRequest;

class TileController extends Controller
{
    const EMPTY_TILE_ID='147ca8bf480d89b17921e24e3c09edcf1cb2228b';
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

    public function relative($gridID, $z, $y, $x){

        $location=DB::table("location")->where('gridID',$gridID)->where("map_z",$z)->where('map_row',$x)->where("map_col",$y)->first();
        if(isset($location)){
            $tile=DB::table("tile")->where("id",$location->tileID)->first();
            return response($tile->image, 200)->header('Content-Type', 'image/png');
        }
        else{
            return response(["message"=>"no tile with that location"],404);
        }
    }


    public function true_relative($z, $y, $x){
            $longitude = ($x / pow(2, $z)) * 360 - 180;
            $latitude = rad2deg(atan(sinh(pi() * (1 - 2 * $y / pow(2, $z)))));
            //works
            // dd( array('latitude' => $latitude, 'longitude' => $longitude));

        
        
        $location=DB::table("location")->where("tileID","!=",self::EMPTY_TILE_ID)->where("map_z",$z)->where('map_row',$x)->where("map_col",$y)->first();
        if(isset($location)){
            $tile=DB::table("tile")->where("id",$location->tileID)->where("id",'!=',self::EMPTY_TILE_ID)->first();
            if(isset($tile)){
                return response($tile->image, 200)->header('Content-Type', 'image/png');
            }
        }
        return response(["message"=>"no tile with that location"],404);
    }

    public function coordinate($lat, $long, int $zoom){
        $x = (int)(($long + 180) / 360 * pow(2, $zoom));
        $y = (int)((1 - log(tan(deg2rad($lat)) + 1 / cos(deg2rad($lat))) / pi()) / 2 * pow(2, $zoom));
        $our_y=($zoom * $zoom) - $y - 1;
        //this gives coordinates, but we need to factor in the - y

        $tile=$this->true_relative($zoom, $y, $x);
        return compact("tile","x","y","zoom","our_y");
    }
}
