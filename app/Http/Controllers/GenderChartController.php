<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenderChartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //for gender pie chart
        
        $result = DB::select(DB::raw("SELECT 'Gender' AS 'g', COUNT('AccountID') AS 'gc' FROM 'customer_accounts' GROUP BY 'Gender';"));
        $gendercount = "";
        foreach($result as $val)
        {
            $gendercount.="['".$val->g."',"$val->gc."],";
        }
    }
}
