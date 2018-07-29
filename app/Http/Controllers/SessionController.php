<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
	public function login(Request $request)
	{
		$response = [];
		if(! auth()->attempt(request(['username', 'password'])) ){
			$response = [
				'status' => 'failed',
				'message' => 'login failed',
			];
		}else{
			$response = [
				'status' => 'success',
				'url' => '/dashboard',
			];
		}
		return response()->json($response);
	}

	public function logout()
	{
		auth()->logout();
		return redirect()->home();
	}
}
