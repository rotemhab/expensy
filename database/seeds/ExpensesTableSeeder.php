<?php

use Illuminate\Database\Seeder;
use App\Business;
use App\Expense;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $csvData = Excel::load('Expenses Upload file Nov 2016.csv', function ($reader) {
            $businesses = Business::all();
            $restuls = $reader->all();
            foreach ($restuls as $i=>$j){
                //if the business does not exist, create it.
                if(!$businesses->contains('item', $j->item)){
                    global $newBusiness;
                    $newBusiness = new Business;
                    $newBusiness->item = $j->item;
                    $newBusiness->category = $j->category;
                    $newBusiness->save();
                }
                else {
                    global $business_id;
                    $business_id = $businesses->where('item','=',$j->item)->pluck('id')->first();
                }
                //create the new expense
                $newExpense = new Expense;
                $date1 = strtotime($j->date);
                $date2 = date('Y-m-d',$date1);
                $newExpense->date = $date2;
                $newExpense->type = $j->type;
                $newExpense->item = $j->item;
                $newExpense->category = $j->category;
                $newExpense->amount = $j->amount;
                $newExpense->source = $j->source;
                $newExpense->card = $j->card;
                if(!empty($newBusiness)){
                    $newExpense->business()->associate($newBusiness);
                }
                elseif(!empty($business_id)){
                    $newExpense->business_id = $business_id;
                }
                $newExpense->save();
            };
        }); 
    }
}
