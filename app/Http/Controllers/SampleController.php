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
        
        $csvData = Excel::load('Business List Dec 2016.csv', function ($reader) {
            $restuls = $reader->all();
            foreach ($restuls as $i=>$j){
                DB::table('businesses')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'category' => $j->category,
                'item' => $j->item;
                ]);
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