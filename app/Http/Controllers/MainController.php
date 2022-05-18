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

	public function home(){
		return "hey";
	}
}