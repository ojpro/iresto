<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use App\Models\PlateImage;
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
		$plates = Plate::with('category')->paginate(10);

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

		/* TODO: DRY & use queues */

		if ($request->hasFile('images')) {
			foreach ($request->images as $image) {
				$name = 'plate_' . time() . '.' . $image->getClientOriginalExtension();
				if ($image->move(public_path('images'), $name)) {

					PlateImage::create([
						'plate_id' => $plate->id,
						'image_url' => 'images/' . $name
					]);
				}
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

		$plate = Plate::find($id)->with('images');

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
				$name = 'plate_' . time() . rand(1, 1000) . '.' . $image->getClientOriginalExtension();
				if ($image->move(public_path('images'), $name)) {

					PlateImage::create([
						'plate_id' => $id,
						'image_url' => 'images/' . $name
					]);
				}
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
}
