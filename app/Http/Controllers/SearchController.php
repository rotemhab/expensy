<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;


class SearchController extends Controller
{
    public function index() {

        //get all expenses from DB
        $searchResults = Expense::all();
        return view('search');
        
    }
    
    public function display(Request $request) {
        $search = $request->input('search');
        //get relevant search results from DB
        $searchResults = Expense::where('item','LIKE','%'.$search.'%')->get()->sortBy('date');
        return view('search')->with('searchResults', $searchResults);
        
    }
}
