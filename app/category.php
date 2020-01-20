<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function products()
    {
        return $this->belongsToMany(jobs::class);
    }
    public function category()
    {
        return $this->hasMany('App\job','categories_id','categories_id');
    }
}
