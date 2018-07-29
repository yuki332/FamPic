<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class RegisterController extends Controller
{
	public function register(Request $request)
	{
		$user = $this->create($request->all());
		auth()->login($user);
		return '/dashboard';
	}

	protected function create(array $data){
		return User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => Hash::make($data['password'])
		]);
	}
}
