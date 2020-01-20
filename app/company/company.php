<?php

namespace App\company;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
   protected $primaryKey = 'user_id'; //Default: id
    protected $guarded=[];
    
    public $timestamps = true;
    Public function city(){
        return $this->hasOne('App\city','cities_id','cities_id');
    }
    Public function state(){
        return $this->hasOne('App\state','states_id','states_id');
    }
    Public function company_industry(){
        return $this->hasOne('App\company\industry','industry_id','industry_id');
    }
    Public function company_type(){
        return $this->hasOne('App\company\company_type','company_type_id','company_type_id');
    }
    Public function company_size(){
        return $this->hasOne('App\company\company_size','company_size_id','company_size_id');
    }
}
