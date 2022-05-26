<?php

namespace App\Http\Controllers;

use App\Models\PlateImage;
use Illuminate\Http\Request;

class PlateImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlateImage  $plateImage
     * @return \Illuminate\Http\Response
     */
    public function show(PlateImage $plateImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlateImage  $plateImage
     * @return \Illuminate\Http\Response
     */
    public function edit(PlateImage $plateImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlateImage  $plateImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlateImage $plateImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlateImage  $plateImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlateImage $plateImage)
    {
        dd($plateImage);
    }
}
