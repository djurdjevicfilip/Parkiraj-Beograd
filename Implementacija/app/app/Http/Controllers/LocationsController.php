<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
class LocationsController extends Controller
{
   
    /** Storing parking locations
     *  & delegating to GarageController and SensorController
     */
    public function store(){
        $x=request('x');
        $y=request('y');
        $type=request('parkingType');

        $location=new Location;
        $location->store($x,$y);

        $parkinglocation=new ParkingLocation;
        $parkinglocation->store($location->idLoc, $type);

        if($type=="sensor"){
            SensorController::store($parkinglocation);
        }
        else{
            GarageController::store($parkinglocation);
        }
        return redirect('/');
    }

  
}
