<?php

namespace App\Observers;

use App\Sensor;

class SensorObserver
{
    public function created(Sensor $sensor)
    {
        \Log::debug('CREATED');
    }

    //What happens when a sensor is updated
    public function updated(Sensor $sensor)
    {

        \Log::debug('UPDATED');
    }
}