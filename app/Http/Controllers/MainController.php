<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * home method to manage access to the system by
     * redirecting to the login if the visitor not authenticated
     * or to the dashboard if not
     */

	public function home(){
		return "hey";
	}
}
