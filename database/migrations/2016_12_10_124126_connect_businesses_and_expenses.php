<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBusinessesAndExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {


            # Add a new INT field called `business_id` that has to be unsigned (i.e. positive)
            $table->integer('business_id')->unsigned();

            # This field `business_id` is a foreign key that connects to the `id` field in the `businesses` table
            $table->foreign('business_id')->references('id')->on('businesses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('expenses', function (Blueprint $table) {

            # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('expenses_business_id_foreign');

            $table->dropColumn('business_id');
        });
    }
}
