<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
	/**
	 * Manage access to the system by
	 * redirecting to the login if the visitor not authenticated
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function home()
	{
		return redirect('dashboard');
	}

	/***
	 * Login verification for clients
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */

	public function login(Request $request)
	{
		$user = User::where('email', $request->email)->first();
		if (($user != null) && Hash::check($request->password, $user->password)) {
			return response()->json('success');
		} else {
			return response()->json(['message' => 'invalid credentials']);
		}
	}

	/**
	 * Find Client by his id
	 *
	 * @param Request $request
	 *
	 * @return User
	 */
	public function find(Request $request)
	{
		return User::find($request->id);
	}

	/**
	 * Get List of all clients
	 *
	 * @return User
	 */

	public function all_clients()
	{
		return User::all();
	}
}
