<?php

use Illuminate\Database\Seeder;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses= array("Zepra", "Amazon","Bed, Bath & Beyond", "McDonalds");
        foreach (range(1,100) as $index){
            //crete random timestamp
            $new_date_timestamp = mt_rand(date_create('2016-01-01')->getTimestamp(), date_create('2016-12-31')->getTimestamp());
            $random_date = new DateTime();
            $random_date->setTimestamp($new_date_timestamp); 
            
            //select a random business
            $business = $businesses[mt_rand(0,count($businesses)-1)];
            
            //insert the data to the row
            DB::table('expenses')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'date' => $random_date,
            'type' => 'expense',
            'category' => 'restaurants',
            'item' => $business,
            'amount' => rand(1,1000),
            ]);
        }
    }
}
