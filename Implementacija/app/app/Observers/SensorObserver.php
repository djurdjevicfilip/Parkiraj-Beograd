<?php

namespace App\Observers;

use App\Sensor;
use App\Events\SensorUpdated;
use App\Http\Controllers\SensorController;
/**
 * This class is used for sensor updating
 * Author: Filip Djurdjevic
 */
class SensorObserver
{
    /*
     * On location update/create
     * @param sensor
     */
    public function saving(Sensor $sensor)
    {
        
        $data=SensorController::sensorUpdateData($sensor);

        event(new SensorUpdated($data,false,true));
    }
    /*
     * On sensor delete
     * @param sensor
     */
    public function deleting(Sensor $sensor){
        
        
        $data=SensorController::sensorUpdateData($sensor);

        event(new SensorUpdated($data,true,true));
    }
   
}