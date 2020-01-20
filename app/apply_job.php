<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apply_job extends Model
{
        public $table = 'apply_jobs';
        protected $guarded=[];
        public $primaryKey = 'apply_jobs_id';
        
        public function jobs()
        {
            return $this->belongsTo('App\job', 'jobs_id');
        }
         public function candidate()
        {
            return $this->belongsTo('App\user','apply_users_id','id');
        }
}
