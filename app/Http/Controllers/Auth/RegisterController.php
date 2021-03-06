<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

use Validator;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::DASH;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *  @return \Illuminate\Contracts\Validation\Validator

     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'     => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // /**
    //  * Create a new user instance after a valid registration.
    //  *
    //  * @return \App\User
    //  */
    protected function create(array $data)
    {
        try{

            return User::create([
                'first_name'     => $data['first_name'],
                'last_name'     => $data['last_name'],
                'email'    => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }catch(\Exception $e){
            dd($e);
        }

    }
        // public function register(Request $request)

        // {

        // $user = User::create($request->all());

        // // event(new Registered($user));

        // auth()->login($user);

        // return redirect('/')->with('success', "Account successfully registered.");
        // }

}

