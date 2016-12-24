<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Expense;
use DB;
use Carbon\Carbon;   

class categoryController extends Controller
{
    public function index() {

        //get all expenses from DB
        $categories = Business::all()->groupBy('category');
        return view('categories')->with('Categories', $categories);
        
    }
    public function display(Request $request) {
        //get all expenses from DB
        $categories = Business::all()->groupBy('category');
        
        //validate the form input
        $this->validate($request, [
            'category' => 'required|max:25'
        ]);
        //get the category value
        $category = $request->input('category');
        //get all expenses for category from DB
        $expenses = Expense::where('category', '=', $category)
            ->whereBetween('date', array("2016-01-01", "2016-12-31"))
            ->orderBy('date')
            ->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->date)->format('m');
            });
        /*
        $categoryExpensesByMonth = $expenses
            ->where('business.category','=',$category)
            ->sortBy('date')
            ->groupBy(function($date) {
                return Carbon::parse($date->date)->format('m');
            });
        */
        return view('categories')->with('categoryExpensesByMonth', $expenses)->with('Categories', $categories)->with('category', $category);
        
    }
}
