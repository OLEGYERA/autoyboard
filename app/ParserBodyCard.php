<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParserBodyCard extends Model
{
    protected $fillable = [
        'body_id', 'fuel_id', 'transmission_id', 'gear_id', 'color_id',
        'doors', 'seats', 'mileage', 'volume', 'horse', 'kilowatt', 'cons_city',
        'cons_track', 'cons_mixed', 'metalic'
    ];
}
