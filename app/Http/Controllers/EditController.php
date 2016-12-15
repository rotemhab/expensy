<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Business;

class EditController extends Controller
{
    public function edit(Request $request) {
        $expense_id = $request->input('expense_id');
        $expense = Expense::where('id','=',$expense_id)->first();
        $categories = Business::all()->groupBy('category');
        return view('edit')->with('expense', $expense)->with('Categories', $categories);
    }
    
    public function save(Request $request) {
        //get the expense id
        $expense_id = $request->input('expense_id');
        
        //get the expense
        $expense = Expense::where('id','=',$expense_id)->first();
        
        //get the form parameters
        $expense_date = $request->input('date');
        $expense_item = $request->input('item');
        $expense_amount = $request->input('amount');
                
        //update the expense
        $expense->date = $expense_date;
        $expense->item = $expense_item;
        $expense->amount = $expense_amount;
        $expense->save();
        
        $categories = Business::all()->groupBy('category');
        $expense = Expense::where('id','=',$expense_id)->first();
        
        
        return view('edit')->with('expense', $expense)->with('Categories', $categories)->with('Success', TRUE);
    }
}
