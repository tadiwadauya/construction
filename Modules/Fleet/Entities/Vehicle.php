<?php

namespace Modules\Fleet\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [];

    // protected static function newFactory()
    // {
    //     return \Modules\Fleet\Database\factories\VehicleFactory::new();
    // }
}
