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
       /* $locations = Location::all()->first();
        if($locations!=null)
            $locations=$locations->parkinglocation;*/
        return view('pages.index');//with('locations',$locations);
    }
    //Guest index page
    public function register(){
        return view('auth.register');
    }
    
}
