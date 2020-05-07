<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
class LocationsController extends Controller
{
    public function convert(){
        $joined_locations=ParkingLocation::with(['location','sensor'])->get();
        return view('pages.user')->with('data',$joined_locations);
    }
}
