<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Elasticsearch\Client;

class job extends Model
{
    protected $primaryKey = 'jobs_id';
 


protected $mappingProperties = array(
        'jobs_title' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'description' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
      );








 protected $guarded=[];
    public function categories()
        {
        return $this->belongsToMany(Category::class);
        }
    Public function jobs_types(){
        return $this->hasOne('App\jobs_type','jobs_types_id','jobs_types_id');
    }
    Public function category(){
        return $this->hasOne('App\category','categories_id','categories_id');
    }
    Public function salary_type(){
        return $this->hasOne('App\salary_type','salary_types_id','salary_types_id');
    }
    Public function city(){
        return $this->hasOne('App\city','cities_id','cities_id');
    }
    Public function state(){
        return $this->hasOne('App\state','states_id','states_id');
    }
    Public function company(){
        return $this->hasOne('App\company\company','user_id','user_id');
    }
    Public function user(){
        return $this->hasOne('App\user','id','user_id');
    }
    public function jobs()
    {
        return $this->hasMany('App\apply_job','jobs_id');
    }
     public function industry()
    {
        return $this->hasOne('App\company\industry','industry_id','industry_id');
    }
    public function apply_job()
    {
        return $this->hasMany('App\apply_job','jobs_id','jobs_id');
    }
}
