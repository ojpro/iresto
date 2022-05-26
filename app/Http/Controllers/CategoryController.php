<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
		$categories = Category::select(['id','label'])->orderBy('created_at')->paginate(10);
        return view('pages.categories')->with(['categories'=>$categories]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
			'label'=> ['required','string','unique:categories','max:200']
        ]);

		Category::create([
			'label'=>$request->label
		]);

		return redirect()->route('categories.index');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @reurn \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
			'label'=>['required','string','unique:categories','max:200']
        ]);

		Category::where('id',$id)->update([
			'label'=>$request->label
		]);
		/* TODO: response messages */
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
		return redirect()->back();
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
    public function all(){
    	return Category::all();
    }

	/**
	 * @param int $id
	 *
	 * @return mixed
	 */
    public function find(int $id){
    	return Category::find($id);
    }
}
