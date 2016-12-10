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
            "Restaurants" =>array("Zepra", "Amazon","Bed, Bath & Beyond", "McDonalds", "Starbucks", ),
            "Groceries" =>array("Costco", "Kmart", "Kroger", "Walmart", "All Foods"),
            "Clothing" =>array("Gap", "Uniqlo", "H&M"),
            "Bills" =>array("Verizon", "Direct Energy", "NY City Tax", "Direct TV", "Netflix"),
            "Car & Transportation" =>array("BP", "Shell", "Dan's Auto Service", "NYC Metro Service", "City Bike"),
            "Health" =>array("Walgreens", "CSV", "Rite Aid")
        )
            
    }
}
