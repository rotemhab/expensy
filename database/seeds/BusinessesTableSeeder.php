<?php

use Illuminate\Database\Seeder;

class BusinessesTableSeeder extends Seeder
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
            "Health" =>array("Walgreens", "CSV", "Rite Aid"),
            "Home & Garden" => array("Amazon", "Bed, Bath & Beyond", "Pottery Barn", "Ikea")
        );
        foreach ($businesses as $category => $businessesArray){
            foreach ($businessesArray as $business){
                DB::table('businesses')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'category' => $category,
                'item' => $business
                ]);
            }
        }
            
    }
}
