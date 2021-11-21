<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller {
	public function edit() {
		if (Auth::user()) {
			$user = User::find(Auth::user()->id);

			if ($user) {
				return view('homepage_hof')->withUser($user);
			} else {
				return redirect()->back();
			}
		} else {
			return redirect()->back();
		}
	}

	public function update(Request $request) {
		$user = User::find(Auth::user()->id);

		if ($request->hasFile('img')) {
			$img = $request->file('img');
			$filename = time() . '.' . $img->getClientOriginalExtension();
			Image::make($img)->resize(300, 300)->save(public_path('/img/' . $filename));

			$user = Auth::user();
			$user->Image = $filename;
			$user->save();

		}

		if ($user) {
			$validate = null;
			if (Auth::user()->email === $request['email']) {
				$validate = $request->validate([
					'StoreName' => 'required|min:2',
					'maximum_cust' => 'required|min:2',
					'StoreOwner' => 'required|min:2',
					'email' => 'required|email',
				]);
			} else {
				$validate = $request->validate([
					'StoreName' => 'required|min:2',
					'maximum_cust' => 'required|min:2',
					'StoreOwner' => 'required|min:2',
					'email' => 'required|email|unique:users',
				]);
			}

			if ($validate) {
				$user->StoreName = $request['StoreName'];
				$user->maximum_cust = $request['maximum_cust'];
				$user->StoreOwner = $request['StoreOwner'];
				$user->email = $request['email'];

				$user->save();
				$request->session()->flash('success', 'Your User Information has now been updated!');
				return redirect()->back();
			} else {
				return redirect()->back();
			}

		} else {
			return redirect()->back();
		}
	}

	public function updateprof() {
		return view('homepage_hof', array('user' => Auth::user()));

	}

	// public function update_img(Request $request) {
	// 	//handle the user upload of image
	// 	if ($request->hasFile('img')) {
	// 		$img = $request->file('img');
	// 		$filename = time() . '.' . $img->getClientOriginalExtension();
	// 		Image::make($img)->resize(300, 300)->save(public_path('/img/' . $filename));

	// 		$user = Auth::user();
	// 		$user->Image = $filename;
	// 		$user->save();

	// 	}
	// 	return view('homepage_hof', array('user' => Auth::user()));
	// }

}