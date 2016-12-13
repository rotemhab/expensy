<?php

use Illuminate\Database\Seeder;
use App\Business;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses= array(
            "Restaurants" =>array("Zepra", "McDonalds", "Starbucks", "Costa Coffee", "Burger King", "Benihana"),
            "Groceries" =>array("Costco", "Kmart", "Kroger", "Walmart", "All Foods"),
            "Clothing" =>array("Gap", "Uniqlo", "H&M"),
            "Bills" =>array("Verizon", "Direct Energy", "NY City Tax", "Direct TV", "Netflix"),
            "Car & Transportation" =>array("BP", "Shell", "Dan's Auto Service", "NYC Metro Service", "City Bike"),
            "Health" =>array("Walgreens", "CVS", "Rite Aid"),
            "Home & Garden" => array("Amazon", "Bed, Bath & Beyond", "Pottery Barn", "Ikea")
        );
        
        foreach (range(1,1000) as $index){
            //crete random timestamp
            $new_date_timestamp = mt_rand(date_create('2016-01-01')->getTimestamp(), date_create('2016-12-31')->getTimestamp());
            $random_date = new DateTime();
            $random_date->setTimestamp($new_date_timestamp); 
            
            //select a random business
            $randCategory = array_rand($businesses);
            $randBusiness = $businesses[$randCategory][array_rand($businesses[$randCategory])];
            
            //find the expense category
            $business_id = Business::where('item','=',$randBusiness)->pluck('id')->first();

            //insert the data to the row
            DB::table('expenses')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'date' => $random_date,
            'type' => 'expense',
            'item' => $randBusiness,
            'amount' => rand(1,1000),
            'business_id' =>$business_id,
            ]);
        }
    }
}
