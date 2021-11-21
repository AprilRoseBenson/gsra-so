<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        
        $show = User::all();
        return view('home')->with("show",$show);
    }

    
    public function destroy($id) {

        User::destroy($id);
        echo "Record deleted successfully.<br/>";
        echo '<a href = "/home">Click Here</a> to go back.';
     }
    
}
