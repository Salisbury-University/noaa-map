<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTileRequest;
use App\Http\Requests\UpdateTileRequest;
use App\Models\Tile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

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
        return("Tile at " . $lattitude . ", ". $longitude . " with a width of " . $scope);
    }

    public function relative($x, $y, $z){
        return("Tile at " . $x . ", " . $y . ", " . $z);
    }
}
