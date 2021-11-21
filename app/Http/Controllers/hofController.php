<?php

namespace App\Http\Controllers;

use App\store_records;
use Gate;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\customer_account;

class hofController extends Controller {

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

	public static function totalamount(){
		$user = Auth::user()->id;
		$tot = store_records::where('StoreID',$user)->count('id');
		return $tot;
	}
	public function update(Request $request)
 {
 
 $user = User::find(Auth::user()->id);
 
 if($user)
 {
 $user->email = $request['email'];
 $user->password =Hash::make( $request['password']);

 
 
 $user->save();
 $request->session()->flash('success','Your Password have now been updated!');
 return redirect()->back();
 }
 else{
 return redirect()->back();
 }
 }
 public function edit()
 {
 if(Auth::user())
 {
 $user = User::find(Auth::user()->id);
 
 if($user)
 { 
 return view('hofaddexpenses')->withUser($user);
 }
 else {
 return redirect()->back();
 }
 }
 else
{
 return redirect()->back();
 }
 }
	
	

	public function report(Request $request){
		$user = Auth::user()->id;
		if (request()->has('fromDate') && request()->has('toDate')) {
		$fromDate = $request->input('fromDate');
		$toDate = $request->input('toDate');

		$data = \DB::select("SELECT * FROM store_records WHERE time_in BETWEEN '$fromDate 00:00:00' AND '$toDate 00:00:00' AND StoreID = $user ");
		//}
		//else{
		//	$data = store_records::all();
		//}
		//return view("hofindex")->with("data", $data);

		//$data = DB::table('store_records')
		//->join('users', 'store_records.StoreID', '=', 'users.id')
		//->join('customer_accounts', 'users.AccountID', '=', 'customers_accounts.AccountID')
		//->select("SELECT customer_accounts.CustomerName, customer_accounts.Age, customer_accounts.Gender, customer_accounts.CustomerAddress, store_records.time_in, store_records.time_out FROM store_records WHERE time_in BETWEEN '$fromDate 00:00:00' AND '$toDate 00:00:00' AND StoreID = $user ");
		}
		else{
			$data = store_records::all()->where('StoreID',$user);
			}
			return view("hofindex")->with("data", $data);
	}

	/*
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
	}*/

	public static function ltid() {
		$lid = store_records::orderBy('id', 'desc')->first()->id + 1;
		return $lid;
	}

	public function index() {

		$show = store_records::all();
		return view("hofindex")->with("show", $show);
	}
/*
	public function store(Request $request) {

		

		$insert = new store_records;
		$insert->id = $request->input('id');
		$insert->b_id = $request->input('b_id');
		$insert->t_type = $request->input('t_type');
		$insert->e_category = $request->input('e_category');
		$insert->amount = $request->input('amount');
		$insert->note = $request->input('note');
		$insert->save();
		return view('hofsuccess');
	}
*/
	public function create() {
		//return view ('hofadd');
	}

	public function show($sh) {

		$show = customer_account::find($sh);
		return view("hofshow")->with("show", $show);
		
	}

	/*public function update(Request $request, $id){

		        if(!Gate::allows('isHOF')){
					abort(404,"Sorry, You can't do this action");
		        }

		        $update = transactions::find($id);
		        $update-> id = $request->id;
		        $update->b_id = $request->b_id;
		        $update->t_type = $request->t_type;
		        $update->e_category = $request->e_category;
		        $update->amount = $request->amount;
		        $update->note = $request->note;
		        $update->save();
		        echo "Sucessfully Updated";
		    }

		    public function edit($id){

		        if(!Gate::allows('isHOF')){
					abort(404,"Sorry, You can't do this action");
		        }

		        $edit = transactions::find($id);
		        return view('edit')->with("edit", $edit);
	*/

	public function destroy($id) {

	}
}