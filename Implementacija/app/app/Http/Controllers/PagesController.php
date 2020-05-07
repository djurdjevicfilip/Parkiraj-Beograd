<?php

namespace App\Http\Controllers;
use App\User;
use App\Location;
use App\ParkingLocation;
use Illuminate\Http\Request;
/**
 * FOR NON-AUTHENTICATED USERS (GUESTS)
 */
class PagesController extends Controller
{
    //Guest index page
    public function index(){
        $locations = Location::all()->first()->parkinglocation;
        return view('pages.index')->with('locations',$locations);
    }
    //Guest index page
    public function register(){
        return view('auth.register');
    }
}
