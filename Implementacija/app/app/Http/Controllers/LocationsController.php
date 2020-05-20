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
        $parkinglocation->store($location->idLoc);
        if($type=="sensor"){
            $disabled=request('disabled');
            if($disabled=="on"){
                $disabled=1;
            }else{
                $disabled=0;
            }
            $zone=request('zone');
            $sensor=new Sensor;
            \Log::debug($parkinglocation->idPar);
            $sensor->store($parkinglocation->idPar,$disabled,$zone);
        }
        else{
            $capacity=request('capacity');
            $garage=new Garage;
            $garage->store($parkinglocation->idPar,$capacity);
        }
        return redirect('/');
    }

<<<<<<< Updated upstream
    public static function newLocationData($subclass){
        $parkinglocation=ParkingLocation::where('idPar',$subclass->idPar)->first();
        $location=Location::where('idLoc',$parkinglocation->idLoc)->first();
        $dataA = $subclass->toArray();
        $dataB = $location->toArray();
        $dataMerge = array_merge($dataA, $dataB);
        return $dataMerge;
    }
=======
    public function delete(Request $request,$idPar){
        \Log::debug($request);
        $location = ParkingLocation::find($idPar);
        if($location->sensor!=null){
            $sensor=Sensor::find($idPar);
            $sensor->delete();
        }else{
            $garage=Garage::find($idPar);
            $garage->delete();
        }
        $location->delete();

        return redirect()->to(route('admin').'#locations');
    }

  
>>>>>>> Stashed changes
}
