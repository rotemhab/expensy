<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Expense;

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
}

?>