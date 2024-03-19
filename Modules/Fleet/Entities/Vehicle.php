<?php

namespace Modules\Fleet\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'colour',
        'bodytype',
        'fleetnumber',
        'chasisnumber',
        'enginenumber',
        'yearofmanufacture',
        'fueltype',
        'netmass',
        'regnumber',
        'assignedTo',
        'assingType',
        'assignedby',
        'dateAssigned',
        'isAssigned',
        'branded',
        'driver_id',
        'department_id',
    ];

    // protected static function newFactory()
    // {
    //     return \Modules\Fleet\Database\factories\VehicleFactory::new();
    // }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
