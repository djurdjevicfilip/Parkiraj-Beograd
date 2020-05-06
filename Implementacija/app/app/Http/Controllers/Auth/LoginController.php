<?php

namespace App\Http\Controllers\Auth;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo(){
        
        $type = Auth::user()->type;
        switch ($type) {
            case 0: 
                return '/home';
            break;
            case 1: 
                return '/mod';
            break;
            case 2: 
                return '/admin';
            break;
            
        }   
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->to(route('index').'#login')->withInput($request->only($this->username(), 'remember'))
        ->withErrors([
            $this->username() => Lang::get('auth.failed'),
        ]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
