<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManufactureCountry extends Model
{
    protected $fillable = [
        'title', 'rtitle', 'utitle', 'alias'
    ];
}
