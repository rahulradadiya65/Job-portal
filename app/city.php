<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
Public function state1(){
        return $this->hasOne('App\state','states_id','state_id');
    }
}
