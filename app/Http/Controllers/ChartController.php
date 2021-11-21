<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\store_records;
use Charts;
use DB;

class ChartController extends Controller
{
    public function index()
    {
            /*
        
        $TotalProfit = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Profit')->get();
        $TotalExpenses = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Expenses')->get();
        $lian = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Profit')->where('b_id','1001')->get();
        $nas = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Profit')->where('b_id','1000')->get();
        $tuy = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Profit')->where('b_id','1002')->get();
        $lian1 = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Expenses')->where('b_id','1001')->get();
        $nas1 = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Expenses')->where('b_id','1000')->get();
        $tuy1 = transactions::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->where('t_type','Expenses')->where('b_id','1002')->get();
        $profchart = Charts::database($TotalProfit, 'bar', 'highcharts')
			      ->title("Total Profit")
                  ->elementLabel('Amount Ratio')
                  
			      ->dimensions(1000, 500)
			      ->responsive(true)
                  ->groupByMonth(date('Y'), true);
        $exchart = Charts::database($TotalExpenses, 'bar', 'highcharts')
			      ->title("Total Expenses")
                  ->elementLabel('Amount Ratio')
			      ->dimensions(1000, 500)
			      ->responsive(true)
			      ->groupByMonth(date('Y'), true);
 
 
 
        $line_chartnas = Charts::database($nas, 'line', 'highcharts')
			    ->title('Nasugbu Branch Profit')
                ->elementLabel('Amount Ratio' )
			    ->dimensions(1000,500)
                ->responsive(true)
                ->groupByMonth(date('Y'), true);
        $line_chartlian = Charts::database($lian, 'line', 'highcharts')
			    ->title('Lian Branch Profit')
                ->elementLabel('Amount Ratio')
			    ->dimensions(1000,500)
                ->responsive(true)
                ->groupByMonth(date('Y'), true); 
        $line_charttuy = Charts::database($tuy, 'line', 'highcharts')
			    ->title('Tuy Branch Profit')
                ->elementLabel('Amount Ratio')
			    ->dimensions(1000,500)
                ->responsive(true)
                ->groupByMonth(date('Y'), true);
         $line_chartnas1 = Charts::database($nas1, 'line', 'highcharts')
			    ->title('Nasugbu Branch Expenses')
                ->elementLabel('Amount Ratio')
			    ->dimensions(1000,500)
                ->responsive(true)
                ->groupByMonth(date('Y'), true);
        $line_chartlian1 = Charts::database($lian1, 'line', 'highcharts')
			    ->title('Lian Branch Expenses')
                ->elementLabel('Amount Ratio')
			    ->dimensions(1000,500)
                ->responsive(true)
                ->groupByMonth(date('Y'), true); 
        $line_charttuy1 = Charts::database($tuy1, 'line', 'highcharts')
			    ->title('Tuy Branch Expenses')
                ->elementLabel('Amount Ratio')
			    ->dimensions(1000,500)
                ->responsive(true)
                ->groupByMonth(date('Y'), true);
               
               
       
 */

 
        return view('homepage_hof');
    }
    
}
