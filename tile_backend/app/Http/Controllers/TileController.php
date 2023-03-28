<?php

namespace App\Http\Controllers;

use App\Models\Tile;
use Illuminate\Http\Response;
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

    public function relative($x, $y, $z){
        $tile=Tile::where('x_position',$x)->where('y_position',$y)->where('z_position',$z)->first();
        $image = Storage::get($tile->image_path);
        return response($image, 200)->header('Content-Type', 'image/png');
    }
}
