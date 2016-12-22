<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Expense;
use App\Business;
use Excel;

class CSVuploadController extends Controller
{

    public function confirmUpload(){
        //get the CSV data
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
        
        //d
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
            if ($j->source == "כ. אשראי"){
                $date1 = strtotime($j->date);
                $date2 = date('Y-m-d',$date1);
                $newExpense->date = $date2;
                //echo date("jS F, Y", strtotime($date2)) . "<br>"; 

            }
            elseif ($j->source == "חשבון"){
                $date1 = $j->date;
                $dateElements = explode("/", $date1);
                $day = $dateElements[0];
                if (strlen($day)==1){
                    $day = "0" . $day;
                };
                $month = $dateElements[1];
                $year = "20" . $dateElements[2];
                $date2 = $year . "-" . $month . "-" . $day;
                $newExpense->date = $date2;
                //echo date("jS F, Y", strtotime($date2)) . "<br>";
            }
            $newExpense->type = $j->type;
            $newExpense->item = $j->item;
            $newExpense->amount = $j->amount;
            array_push($upload, $newExpense);            
        }
        $categories = Business::all()->groupBy('category');
        return view('confirmUpload')->with('Upload', $upload)->with('Categories', $categories);
    }
    
    public function CSVupload(Request $request) {
        //get the input data
        $input = $request->input();
        
        //validate that the four input arrays have the same length
        if (count($input["date"]) == count($input["item"]) && count($input["item"]) == count($input["amount"]) && count($input["amount"]) == count($input["category"])){
            echo "TRUE";
        };
        
        //Get a list of all businesses
        $businesses = Business::all();
        
        //upload each expense
        for ($i=0; $i<count($input["date"]); $i++){
            //create variables for all the input data
            $date = $input["date"][$i];
            $category = $input["category"][$i];
            $item = $input["item"][$i];
            $amount = $input["amount"][$i];
            
            //check if the business already exists, and if not, add it.
            if(!$businesses->contains('item', $item)){
                global $newBusiness;
                $newBusiness = new Business;
                $newBusiness->item = $item;
                $newBusiness->category = $category;
                $newBusiness->save();
            }
            else {
                global $business_id;
                $business_id = $businesses->where('item','=',$item)->pluck('id')->first();
            }
            //add the new expense
            $newExpense = new Expense;
            $newExpense->date = $date;
            $newExpense->type = 'expense';
            $newExpense->item = $item;
            $newExpense->amount = $amount;
            if(!empty($newBusiness)){
                $newExpense->business()->associate($newBusiness);
            }
            elseif(!empty($business_id)){
                $newExpense->business_id = $business_id;
            }
            $newExpense->save();
        }
        
        
    }
}

?>