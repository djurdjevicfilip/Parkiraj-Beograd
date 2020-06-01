<?php

namespace App\Http\Controllers;

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
    
    public function register(){
        return view('auth.register');
    }
    
}
