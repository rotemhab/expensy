<?php

namespace App\Http\Controllers;
use App\Business;
use App\Expense;


use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index() {

        //get all expenses from DB
        $categories = Business::all()->groupBy('category');
        return view('upload')->with('Categories', $categories);
        
    }
    
    public function addExpense(Request $request) {
        //validate the form
        $this->validate($request, [
            'date' => 'required|date',
            'category' => 'required|max:20',
            'item' => 'required|max:20|alpha_num',
            'amount' => 'required|max:10|numeric',
        ]);
        //get the form values
        $date = $request->input('date');
        $category = $request->input('category');
        $item = $request->input('item');
        $amount = $request->input('amount');
        
        //validate the form values
        
        //check if the business already exists in the businesses table and if not, add it
        $businesses = Business::all();
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
        
        //create the new expense
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
        
        return view('upload')->with('Success', 'Success');
        
    }
}
