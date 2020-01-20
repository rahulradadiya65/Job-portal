<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
    //
    protected $table = "skills";
    protected $fillable = ["id","name","created_at","updated_at"];
    
}
