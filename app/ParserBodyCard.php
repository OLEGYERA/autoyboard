<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParserBodyCard extends Model
{
    protected $fillable = [
        'id', 'body_id', 'fuel_id', 'transmission_id', 'gear_id', 'color_id',
        'doors', 'seats', 'mileage', 'volume', 'horse', 'kilowatt', 'cons_city',
        'cons_track', 'cons_mixed', 'metalic'
    ];

    protected function typeBody(){
        return $this->belongsTo('App\TranportBody', 'body_id');
    }

    protected function typeFuel(){
        return $this->belongsTo('App\TransportChFuel', 'fuel_id');
    }

    protected function typeTransmission(){
        return $this->belongsTo('App\TranportChTransmission', 'transmission_id');
    }

    protected function typeGear(){
        return $this->belongsTo('App\TranportChGear', 'gear_id');
    }

    protected function typeColor(){
        return $this->belongsTo('App\TransportChColor', 'color_id');
    }
}
