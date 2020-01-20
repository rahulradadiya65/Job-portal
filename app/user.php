<?php
 
namespace App;
 
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
 
class User extends Authenticatable implements MustVerifyEmailContract
{
    use Notifiable;
 protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','mobile_number', 'password','cities_id','states_id',
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function applied_jobs()
    {
        return $this->hasMany('App\apply_job','apply_users_id');
    }
	    public function jobs()
    {
        return $this->hasMany('App\job','users_id','id');
    }
	
	
    Public function city(){
        return $this->hasOne('App\city','cities_id','cities_id');
    }
    Public function state(){
        return $this->hasOne('App\state','states_id','states_id');
    }
}