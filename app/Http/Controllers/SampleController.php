<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Expense;

class SampleController extends Controller
{

    public function example() {

        $expenses = Expense::all();
        
        if(!$expenses->isEmpty()) {
            # Output the books
            foreach($expenses as $expense) {
                echo $expense->amount.'<br>';
            }
        }
        else {
            echo 'No expenses found';
        }

    }
}

?>