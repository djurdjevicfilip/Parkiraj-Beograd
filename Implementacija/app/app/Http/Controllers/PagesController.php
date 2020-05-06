<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
/**
 * FOR NON-AUTHENTICATED USERS (GUESTS)
 */
class PagesController extends Controller
{
    
    //Guest index page
    public function index(){
        return view('pages.index');
    }
    //Guest index page
    public function register(){
        return view('auth.register');
    }
}
