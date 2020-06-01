<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
use Validator;
use Redirect;
/**
 * Locaions Controller
 * Author: Danilo Dabovic
 */
class LocationsController extends Controller
{
   
    /** Storing parking locations
     *  & delegating to GarageController and SensorController
     * @param Request $request
     * @return page
     */
    public function store(Request $request){
        //Validation
        $type=request('parkingType');
        if($type=="sensor"){
            $validator = Validator::make($request->all(), [
                'x' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                    ],
                'y' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                ],
                'zone' => [
                    'regex:/Zelena|Plava|Crvena/',
                ],
                
                ]);
        }else{
            $validator = Validator::make($request->all(), [
                'x' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                    ],
                'y' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                ],
                'capacity' => [
                    'regex:/^[0-9]*$/',
                ]
                ]);
        }
        if ($validator->fails()) {
            return Redirect::to(route('admin',['message'=>'3']) . "#add-location");
        }


        $x=request('x');
        $y=request('y');
        

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
        return Redirect::to(route('admin',['message'=>'4']) . "#locations");
    }
    /**
     * Deleting locations
     * @param Request $request 
     * @param $idPar
     * @return admin.blade.php
     */
    public function delete(Request $request,$idPar){
        $parkinglocation = ParkingLocation::find($idPar);
        if($parkinglocation->sensor!=null){
            $sensor=$parkinglocation->sensor;
            $sensor->delete();
        }else{
            $garage=$parkinglocation->garage;
            $garage->delete();
        }
        $parkinglocation->delete();
        $location = $parkinglocation->location();
        $location->delete();
        return redirect()->to(route('admin').'#locations');
    }
    /**
     * Editing locations
     * @param Request $request
     * @return admin.blade.php
     */
    public function edit(Request $request){
        //Validation of inputs.

        $idPar=request('id');
        $x=request('x');
        $y=request('y');
        $location = ParkingLocation::find($idPar);
        if($location->sensor!=null){
            $validator = Validator::make($request->all(), [
                'x' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                    ],
                'y' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                ],
                'zone' => [
                    'regex:/Zelena|Plava|Crvena/',
                ],
                
                ]);
        }else{
            $validator = Validator::make($request->all(), [
                'x' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                    ],
                'y' => [
                    'required', 
                    'string',
                    'regex:/^(-?\d+(\.\d+)?)/',      
                ],
                'cap' => [
                    'regex:/^[0-9]*$/',
                ]
                ]);
        }
        if ($validator->fails()) {
            return Redirect::to(route('admin',['message'=>'5']) . "#locations");
        }

        //Editing in database.

       if($location->sensor!=null){
           $dis=request('dis');
           $zone=request('zone');
           $sensor = $location->sensor;
           $sensor->store($idPar,$dis,$zone);
           \Log::debug($sensor);
       }else{
           $cap = request('cap');
           $garage = $location->garage;
           $garage->store($idPar,$cap);
           \Log::debug($garage);
       }
       $coord = $location->location;
       $coord->store($x,$y);
       return redirect()->to(route('admin',['message'=>'4']).'#locations');
   }



}
