<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Expense;

class SampleController extends Controller
{

    public function example() {

        $expenses = Expense::where('item', 'LIKE', 'McDonalds')->first();
        if($expenses) {
            # Output the books
                return $expenses->item;
            }

        else {
            echo 'No expenses found';
        }

    }
}

?>