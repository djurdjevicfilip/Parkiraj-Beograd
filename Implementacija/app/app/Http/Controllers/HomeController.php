<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Administration;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
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
        $joined_locations=ParkingLocation::with(['location','sensor','garage'])->get();
        return view('pages.user')->with('data',$joined_locations);
    }
    /* Admin page */ 
    public function admin()
    {
        $users=User::with('administration')->get();
        //Passing all users as a parameter for the table
        return view('pages.admin')->with('users',$users);
    }
    /* Moderator page */
    public function mod(){

        // Should pass locations as parameter
        return view('pages.moderator');
    }
}
