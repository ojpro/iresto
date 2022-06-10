<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use App\Models\PlateImage;
use Illuminate\Http\Request;
use App\Events\PlateCreated;

class PlateController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 *
	 */
	public function index()
	{
		$plates = Plate::with('category')->paginate(10);

        foreach ($plates as $plate){
            $plate->thumbnail = $plate->thumbnail();
        }

		return view('pages.plates')->with(['plates' => $plates]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 *
	 */
	public function create()
	{
		$categories = \App\Models\Category::select(['id', 'label'])->get();

		return view('pages.new-plate')->with(['categories' => $categories]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */

	public function store(Request $request)
	{
		/* TODO: separate those instructions */
		$request->validate([
			'name' => ['required', 'string', 'min:3', 'max:255', 'unique:plates'],
			'price' => ['required', 'numeric'],
			/*TODO: note this in obsidian */
			'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10000'],
			'category_id' => ['required', 'exists:categories,id'],
			'description' => ['required', 'string', 'min:10']
		]);


		$plate = Plate::create([
			'name' => $request->name,
			'price' => $request->price,
			'category_id' => $request->category_id,
			'description' => $request->description
		]);

		if ($request->hasFile('images')) {
			foreach ($request->images as $image) {
				PlateCreated::dispatch($image,$plate->id);
			}
		}

		return redirect()->route('plates.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 *
	 */
	public function edit($id)
	{

		$categories = \App\Models\Category::select(['id', 'label'])->get();

		$plate = Plate::find($id)->with('images')->first();

		return view('pages.update-plate')->with([
			'categories' => $categories,
			'plate' => $plate
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param int $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:255', 'unique:plates,name,' . $id],
			'price' => ['required', 'numeric'],
			'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10000'],
			'category_id' => ['required', 'exists:categories,id'],
			'description' => ['required', 'string', 'min:10']
		]);

		Plate::where('id', $id)
			->update([
				'name' => $request->name,
				'price' => $request->price,
				'category_id' => $request->category_id,
				'description' => $request->description
			]);

		if ($request->hasFile('images')) {
			foreach ($request->images as $image) {
				PlateCreated::dispatch($image,$id);
			}
		}

		return redirect()->route('plates.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy($id)
	{
		Plate::where('id', $id)->delete();
		return redirect()->route('plates.index');
	}

	/**
	 * Fetch All plates for API use
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */

	public function fetchAll(): \Illuminate\Database\Eloquent\Collection
	{
	    $plates = Plate::take(10)->get();

        foreach ($plates as $plate){
            $plate->thumbnail = $plate->thumbnail();
        }
		return $plates;
	}

	/**
	 * Fetch specific plate by his id
	 * @param int $id
	 *
	 * @return Plate
	 */

	public function fetch($id){
		return Plate::findOrFail($id);
	}

	/**
	 * Search for plates by category
	 */

	public function fetchByCategory(string $category){
		return Plate::where('category_id',$category)->get();
	}
}
