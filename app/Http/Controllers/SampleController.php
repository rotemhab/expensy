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
        //test uploading csv file
        $csvData = Excel::load('test.csv', function ($reader) {
            $restuls = $reader->all();
            $data= array();
            foreach ($restuls as $i=>$j){
                $newExpense = new Expense;
                $newExpense->date = $j->date;
                $newExpense->type = $j->type;
                $newExpense->item = $j->item;
                $newExpense->amount = $j->amount;
                array_push($data, $newExpense);
            };
        })->get();
        $upload = array();
        foreach ($csvData as $i=>$j){
            $businesses = Business::all();
            $newExpense = new Expense;
            //check if the business already exists
            if(!$businesses->contains('item', $j->item)){
                $newExpense->category ="";
            }
            else {
                $newExpense->category = $businesses->where('item','=',$j->item)->pluck('category')->first();
            };
            $business_id = $businesses->where('item','=',$j->item)->pluck('id')->first();
            $newExpense->business_id = $business_id;
            $newExpense->date = $j->date;
            $newExpense->type = $j->type;
            $newExpense->item = $j->item;
            $newExpense->amount = $j->amount;
            array_push($upload, $newExpense);
        }
        $categories = Business::all()->groupBy('category');
        return view('confirmUpload')->with('Upload', $upload)->with('Categories', $categories);
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