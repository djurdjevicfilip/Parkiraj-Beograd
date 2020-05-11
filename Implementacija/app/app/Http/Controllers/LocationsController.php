<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
class LocationsController extends Controller
{
    public function convert(){
        $joined_locations=ParkingLocation::with(['location','sensor','garage'])->get();
        return view('pages.user')->with('data',$joined_locations);
    }
    //Storing sensors (currently working for testing purposes)
    public function store(){
        $x=request('x');
        $y=request('y');
        $type=request('parkingType');

        $location=new Location;
        $location->store($x,$y);
        $parkinglocation=new ParkingLocation;
        $parkinglocation->store($location->id);
        if($type=="sensor"){
            $sensor=new Sensor;
            $sensor->store($parkinglocation->id);
        }
        else{
            $capacity=request('capacity');
            $garage=new Garage;
            $garage->store($parkinglocation->id,$capacity);
        }
        return redirect('/');
    }
}
