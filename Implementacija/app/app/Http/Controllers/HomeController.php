<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
/**
 *  FOR AUTHENTICATED USERS
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* User page */
    public function user()
    {
        return view('pages.user');
    }
    /* Admin page */ 
    public function admin()
    {
        $users=User::all();

        //Passing all users as a parameter for the table
        return view('pages.admin')->with('users',$users);
    }
    /* Moderator page */
    public function mod(){

        // Should pass locations as parameter
        return view('pages.moderator');
    }
}
