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
        $csvData = Excel::load('Business List Dec 2016.csv', function ($reader) {
            $restuls = $reader->all();
            foreach ($restuls as $i=>$j){
                DB::table('businesses')->insert([
                'created_at' => Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
                'category' => $j->category,
                'item' => $j->item,
                ]);
            };
        }); 
    }
}
