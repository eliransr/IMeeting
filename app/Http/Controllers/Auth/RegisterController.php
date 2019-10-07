<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
       if(!empty($data['organization_id'])){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'organization_id' => $data['organization_id'],
            'role' => 'employee',
            'password' => Hash::make($data['password']),
        ]);
       }

       $user = new User();
       $user->name = $data['name'];
       $user->email = $data['email'];
       $user->role = 'admin';
       $user->organization_id =999;
       $user->password = Hash::make($data['password']);
       $user->save();
       

       $organization = new Organization();
       $organization->name = $data['organization_name'];
       $organization->user_id = $user->id;
       $organization->save();

       $user->organization_id = $organization->id;
       $user->save();
       //$user = User::find($user->id);
       //$user ->update($organization->id);   
       return $user;
    }

 
}
