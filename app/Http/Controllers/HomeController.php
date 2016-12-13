<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;   
use App\Expense;
use App\Business;

class HomeController extends Controller
{

    public function index() {

        //get all expenses from DB
        $expenses = Expense::all();
        //group expenses by item
        $grouped = $expenses->groupBy('item');
        //create an associative array that will hold the sum the items and their amount
        $sumItems = array();
        foreach ($grouped as $item){
            $sum = 0;
            foreach ($item as $row){
                $sum += $row['amount'];
            }
            $sumItems[$item[0]->item]=$sum;
        }
        return view('home')->with('ExpenseSum', $sumItems)->with('Expenses', $expenses);
        
    }
    
    public function display(Request $request) {
        //get the from and to dates
        $from = $request->input('from');
        $to = $request->input('to');
        
        //create a collection of data for the month chart
        $sumByMonth= Expense::select(
                DB::raw('sum(amount) as sum'),
                DB::raw("DATE_FORMAT(date,'%M %Y') as month"),
                DB::raw("date")
            )
            ->where('date','>=',$from)
            ->where('date','<=',$to)
            ->orderBy('date', 'ASC')
            ->groupBy('month')
            ->get();
        
        //create a collection of data for the category chart
        $expenses = Expense::with('business')->where('date','>=',$from)->where('date','<=',$to)->get();
        $sumByCategory = $expenses->groupBy('business.category');

        //create a collection of data for the top expense charts
        $topExpenses = $expenses->sortByDESC('amount')->take(10);
        
        
        return view('home')->with('sumByMonth', $sumByMonth)->with('sumByCategory', $sumByCategory)->with('topExpenses', $topExpenses);
    }
}

?>