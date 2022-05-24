<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
	public function index()
	{
		$clients = Client::paginate(15);
		return view('pages.clients')->with(['clients' => $clients]);
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */

	public function store(Request $request)
	{
		$request->validate([
			'first_name' => ['required', 'string', 'max:255'],
			'last_name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => ['required', Rules\Password::defaults()],
		]);

		$user = Client::create([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);

		return response()->json(['message' => $user]);
	}

	public function delete($id){
		Client::find($id)->delete();
		return redirect()->route('clients.index');
	}
}
