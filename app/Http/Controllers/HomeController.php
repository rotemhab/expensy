<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Expense;

class HomeController extends Controller
{

    public function index() {

        $expenses = Expense::all();
        return view('home')->with('Expenses', $expenses);

    }
}

?>