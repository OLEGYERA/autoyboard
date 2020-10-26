<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportChFuel extends Model
{
    protected $fillable = [
        'title', 'rtitle', 'utitle', 'alias', 'type_id'
    ];

    protected $hidden = ['laravel_through_key'];
}
