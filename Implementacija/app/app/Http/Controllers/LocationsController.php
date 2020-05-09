<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
class LocationsController extends Controller
{
    public function convert(){
        $joined_locations=ParkingLocation::with(['location','sensor'])->get();
        return view('pages.user')->with('data',$joined_locations);
    }
    //Storing sensors (currently working for testing purposes)
    public function store(){
        $x=request('x');
        $y=request('y');

        $location=new Location;
        $location->store($x,$y);
        $parkinglocation=new ParkingLocation;
        $parkinglocation->store($location->id);

        $sensor=new Sensor;
        $sensor->store($parkinglocation->id);
        
        return redirect('/');
    }
}
