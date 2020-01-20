<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use App\state;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = '/viewresume';
    
    public function redirectTo()
    {
        $intended = Session::get('url.intended');

        if (!empty($intended)) {
            Session::forget('url.intended');
            return $intended;
        }

        return '/viewresume';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $state = state::all();
        $this->middleware('guest',compact('state'));
    }

    public function email(Request $request)
    {
        
        if($request->get('email')){
         $email = $request->get('email');
         $data = user::ware('email',$email)
         ->count();
         if($data>0)
         {
         echo 'not_unique';    
         }
         else
         {
             echo'unique';
         }
        }
        
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
             'state' => 'required',
            'city' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile_number' => 'required|numeric|digits:10|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//dd($data['city']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'states_id'=> $data['state'],
            'cities_id'=> $data['city'],
            'mobile_number' => $data['mobile_number'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
