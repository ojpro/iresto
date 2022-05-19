<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
		$plates = Plate::with('category')->get();

       return view('pages.plates')->with(['plates'=>$plates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
		$categories = \App\Models\Category::select(['id','label'])->get();

        return view('pages.new-plate')->with(['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
		$request->validate([
			'name'=>['required','string','max:255','unique:plates'],
			'price'=>['required'],
			'category_id'=>['required','exists:categories,id'],
			'description'=>['required','string','min:10']
		]);

		Plate::create([
			'name'=>$request->name,
			'price'=>$request->price,
			'category_id'=>$request->category_id,
			'description'=>$request->description
		]);

		return redirect()->route('plates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {

	    $categories = \App\Models\Category::select(['id','label'])->get();

	    $plate = Plate::find($id);

		return view('pages.update-plate')->with([
			'categories'=>$categories,
			'plate'=>$plate
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
	    $request->validate([
		    'name'=>['required','string','max:255','unique:plates'],
		    'price'=>['required'],
		    'category_id'=>['required','exists:categories,id'],
		    'description'=>['required','string','min:10']
	    ]);

	    Plate::where('id',$id)->update([
		    'name'=>$request->name,
		    'price'=>$request->price,
		    'category_id'=>$request->category_id,
		    'description'=>$request->description
	    ]);

		return redirect()->route('plates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Plate::where('id',$id)->delete();
		return redirect()->route('plates.index');
    }
}
