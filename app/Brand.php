<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'title', 'rtitle', 'utitle', 'alias',
        'logo', 'car', 'moto', 'tractor',
        'water_transport', 'trailer', 'lorry', 'bus',
        'autodom',
    ];
}
