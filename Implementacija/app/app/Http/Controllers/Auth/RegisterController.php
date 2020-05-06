<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Lang;
use Log;
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
        \Log::info('Thision.');
        //Adding custom messages
        $messages = array(
            'password.min' => 'Šifra mora imati minimum 10 karaktera!',
            'password.regex' => 'Šifra ne zadovoljava kriterijume težine šifre!'
        );
        $validator=Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ],$messages);
        return $validator;
    }
    //Override register method
    public function register(Request $request) {

        $validator=$this->validator($request->all());

        //Redirect if validation fails
        if ($validator->fails()) {
            $messages = $validator->messages();
            Log::debug($messages);
            return redirect()->to(route('index').'#register')->withErrors($messages,'register');
        }
        $validator->validate();
    
        $user = $this->create($request->all());
    
        event(new Registered($user));
    
        $this->guard()->login($user);
    
        // Success redirection - which will be attribute `$redirectTo`
        return redirect()->to(route('home'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => 0,
        ]);
        
        $user->storeClient();
        return $user;
    }
}
