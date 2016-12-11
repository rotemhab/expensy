<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function expenses(){
        return $this->hasMany('App\Expense');
    }
}
