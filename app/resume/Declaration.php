<?php

namespace App\resume;

use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{
  protected $primaryKey = 'user_id'; //Default: id
  protected $guarded=[];
}
