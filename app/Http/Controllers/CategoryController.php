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
        //get the category value
        $category = $request->input('category');
        //get all expenses for category from DB
        $expenses = Expense::with('business')->get();
        $categoryExpensesByMonth = $expenses
            ->where('business.category','=',$category)
            ->sortBy('date')
            ->groupBy(function($date) {
                return Carbon::parse($date->date)->format('m');
            });
        $topExpenses = $expenses
            ->where('business.category','=',$category)
            ->sortByDESC('amount')
            ->take(10);
        return view('categories')->with('categoryExpensesByMonth', $categoryExpensesByMonth)->with('Categories', $categories)->with('category', $category)->with('topExpenses', $topExpenses);
        
    }
}
