<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Session;

class DeleteController extends Controller
{
    public function delete(Request $request) {
        $expense_id = $request->input('expense_id');
        $expense = Expense::where('id','=',$expense_id)->first();
        $item = $expense->item;
        $date = $expense->date;
        //get relevant search results from DB
        $deleteExpense = Expense::where('id','=',$expense_id)->delete();
        //return view('search')->with('searchResults', $searchResults);
        Session::flash('flash_view', ['deleted-expense', ['item' => $item, 'date' => $date]]);
        return redirect('/search');
    }
}
