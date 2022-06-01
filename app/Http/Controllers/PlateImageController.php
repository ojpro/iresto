<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use App\Models\PlateImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use Illuminate\Support\Facades\File;

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
	 * @param int $id
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */

    public function destroy(int $id)
    {
    	// get the targeted image
    	$image = PlateImage::find($id);
    	// check if it found
    	if($image){
    		// check if the image is exists in the public directory
    		if(File::exists($image->image_url)){

    			// delete it from the filesystem
    			File::delete($image->image_url);

    			// delete the plate image record from the database
    			$image->delete();

				// return success message
    			return response()->json('Image Deleted Successfully');
		    }
	    }
		// if not found return failed message
	    return response()->json('Failed!. Please try again later.');
    }

    /**
     * Search for plates images
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function search(int $id){
        $images = PlateImage::where('plate_id',$id)->get();
        return response()->json($images);
    }
}
