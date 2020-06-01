<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
use Validator;
use Redirect;
class LocationsController extends Controller
{
   
    /** Storing parking locations
     *  & delegating to GarageController and SensorController
     */
    public function store(Request $request){
        //validation
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
            \Log::debug("pao");
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

    public function edit(Request $request){
         //Validation of inputs.
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
                 'cap' => [
                     'regex:/^[0-9]*$/',
                 ]
                 ]);
         }
         if ($validator->fails()) {
             \Log::debug("pao");
             return Redirect::to(route('admin',['message'=>'5']) . "#locations");
         }

         //Editing in base.

        $idPar=request('id');
        $x=request('x');
        $y=request('y');
        \Log::debug($x);
        \Log::debug($y);
        $location = ParkingLocation::find($idPar);
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
        \Log::debug($coord);
        return redirect()->to(route('admin').'#locations');
    }


}
