<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon;
use App\Expense;

class SampleController extends Controller
{

    public function example() {
        $businesses= array(
            "Restaurants" =>array("Zepra", "Amazon","Bed, Bath & Beyond", "McDonalds", "Starbucks", ),
            "Groceries" =>array("Costco", "Kmart", "Kroger", "Walmart", "All Foods"),
            "Clothing" =>array("Gap", "Uniqlo", "H&M"),
            "Bills" =>array("Verizon", "Direct Energy", "NY City Tax", "Direct TV", "Netflix"),
            "Car & Transportation" =>array("BP", "Shell", "Dan's Auto Service", "NYC Metro Service", "City Bike"),
            "Health" =>array("Walgreens", "CSV", "Rite Aid")
        );
        
        //create a random expense
        $randCategory = array_rand($businesses);
        $randBusiness = $businesses[$randCategory][array_rand($businesses[$randCategory])];
        dump($randCategory);
        dump($randBusiness);
        //$business = $businesses[mt_rand(0,count($businesses)-1)];
        //echo $business;

        //get all expenses from DB
        $expenses = Expense::all();
        //group expenses by item
        $grouped = $expenses->groupBy('item');
        //create a two dimensional array that will hold the sum the items and their amount
        $sumItems = array();
        foreach ($grouped as $item){
            $sum = 0;
            foreach ($item as $row){
                $sum += $row['amount'];
            }
            $sumItems[$item[0]->item]=$sum;
        }
        foreach ($sumItems as $x => $x_sum){
            echo "You've spent " . $x_sum ." on " . $x . " This month <br>";
        }
        
    }
}

?>