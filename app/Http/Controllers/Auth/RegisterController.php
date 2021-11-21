<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */

	protected $redirectTo = '/home';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'StoreName' => 'required|string|max:255',
			'StoreAddress' => 'required|string|max:255',
			'StoreOwner' => 'required|string|max:255',
			'ContactNo' => 'required|string|max:255',
			'OpenHours' => 'required|string|max:255',
			'maximum_cust' => 'required|string|max:255',
			'StoreAddress' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'sp_password' => 'required|string|max:255',
			'password' => 'required|string|min:6|confirmed',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		return User::create([
			'StoreName' => $data['StoreName'],
			'StoreAddress' => $data['StoreAddress'],
			'StoreOwner' => $data['StoreOwner'],
			'ContactNo' => $data['ContactNo'],
			'OpenHours' => $data['OpenHours'],
			'maximum_cust' => $data['maximum_cust'],
			'Image' => 'icon.png',
			'email' => $data['email'],
			'sp_password' => $data['sp_password'],
			'password' => Hash::make($data['password']),
		]);

	}

	public function register(Request $request) {
		$this->validator($request->all())->validate();
		$request->session()->flash('success', 'Registered Successfully!');
		event(new Registered($user = $this->create($request->all())));

		//$this->guard()->login($user);

		return redirect()->back();

	}

}