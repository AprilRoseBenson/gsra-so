<?php

namespace App\Http\Controllers;

use App\store_records;
use App\customer_accounts;
use Gate;
use Illuminate\Http\Request;

class bmcontroller extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public static function totalamount() {
		$tot = store_records::count('id');
		return $tot;
	}
	public static function profit() {
		$prof = store_records::where('t_type', 'Profit')->sum('amount');
		return $prof;
	}
	public static function expenses() {
		$exp = store_records::where('t_type', 'Expenses')->sum('amount');
		return $exp;
	}
	public static function savings() {
		$prof = store_records::where('t_type', 'Profit')->sum('amount');
		$exp = store_records::where('t_type', 'Expenses')->sum('amount');
		$save = $prof - $exp;
		return $save;
	}

	public static function ltid() {
		$lid = store_records::orderBy('id', 'desc')->first()->id + 1;
		return $lid;
	}

	public function index() {

		if (!Gate::allows('isBM')) {
			abort(404, "Sorry, You can't do this action");
		}

		$show = store_records::all();
		return view("bmindex")->with("show", $show);
	}

	public function store(Request $request) {
		$insert = new store_records;
		$insert->id = $request->input('id');
		$insert->b_id = $request->input('b_id');
		$insert->t_type = $request->input('t_type');
		$insert->e_category = $request->input('e_category');
		$insert->amount = $request->input('amount');
		$insert->note = $request->input('note');
		$insert->save();
		return view('bmsuccess');
	}

	public function create() {

	}

	public function show($AccountID) {

		$find = customer_accounts::find($AccountID);
		return view('hofshow')->with("find", $find);
	}

	public function update(Request $request, $id) {

	}

	public function edit() {

	}
	public function destroy($id) {

	}
}
	
