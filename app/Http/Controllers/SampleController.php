<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Expense;
use App\Business;
use Excel;

class SampleController extends Controller
{

    public function example1(){
        
        
        $csvData = Excel::load('Expenses Upload file Nov 2016_test.csv', function ($reader) {
            $businesses = Business::all();
            $restuls = $reader->all();
            foreach ($restuls as $i=>$j){
                //if the business does not exist, create it.
                if(!$businesses->contains('item', $j->item)){
                    global $newBusiness;
                    $newBusiness = new Business;
                    $newBusiness->item = $j->item;
                    $newBusiness->category = $j->category;
                    $newBusiness->save();
                }
                else {
                    global $business_id;
                    $business_id = $businesses->where('item','=',$j->item)->pluck('id')->first();
                }
                //create the new expense
                $newExpense = new Expense;
                $date1 = strtotime($j->date);
                $date2 = date('Y-m-d',$date1);
                $newExpense->date = $date2;
                $newExpense->type = $j->type;
                $newExpense->item = $j->item;
                $newExpense->amount = $j->amount;
                if(!empty($newBusiness)){
                    $newExpense->business()->associate($newBusiness);
                }
                elseif(!empty($business_id)){
                    $newExpense->business_id = $business_id;
                }
                $newExpense->save();
            };
        }); 
        
    }
    public function example() {
        
        //get all expenses from DB
        //$expenses = Expense::all();
        $expenses = Expense::with('business')->get();
        foreach($expenses as $expense) {
            echo $expense->item.' is a ' .$expense->business->category.'<br>';
        }
        
        //dump($expenses);
        
        
        //$business = $expense->business;
        //dump($expense);
        //echo $business->category;
        //dump($business);
        //dump($expense);
        //$category = $expense->category();
        //dump($category);
        //dump($expense->item.' is of type '.$category->category);
        //dump($expense->toArray());
        //echo $category->category;
        /*
        //group expenses by item
        $grouped = $expenses->groupBy('item');
        //create a two dimensional array that will hold the sum the items and their amount
        $sumItems = array();
        foreach ($grouped as $item){
            $sum = 0;
            foreach ($item as $row){
                $sum += $row['amount'];
            }
            $sumItems[$item[0]->item]=$sum;
        }
        foreach ($sumItems as $x => $x_sum){
            echo "You've spent " . $x_sum ." on " . $x . " This month <br>";
        }
        */  
        
    }
}

?>