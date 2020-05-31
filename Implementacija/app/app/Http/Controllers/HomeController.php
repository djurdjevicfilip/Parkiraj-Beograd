<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Administration;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use Session;
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
    public function user($message=0)
    {
        $joined_locations=ParkingLocation::with(['location','sensor','garage'])->get();
        return view('pages.user')->with('data',$joined_locations)->with('message',$message);
    }
    /* Admin page */ 
    public function admin($message=0)
    {
        $users=User::with('administration')->get();
        //Passing all users as a parameter for the table
        return view('pages.admin')->with('users',$users)->with('message',$message);
    }
    /* Moderator page */
    public function mod($message=0){

        // Should pass locations as parameter
        return view('pages.moderator')->with('message',$message);
    }
}
