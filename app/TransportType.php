<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportType extends Model
{
    protected $fillable = [
        'rtitle', 'utitle', 'alias', 'logo'
    ];
}
